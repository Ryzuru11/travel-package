<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
    }

    public function createPayment(Request $request, $bookingId)
    {
        try {
            $booking = Booking::with(['user', 'package'])->findOrFail($bookingId);
            
            // Pastikan user yang login adalah pemilik booking
            if ($booking->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            // Generate unique order ID
            $orderId = 'DILAGA-' . $booking->id . '-' . time();

            // Create payment record
            $payment = Payment::create([
                'booking_id' => $booking->id,
                'order_id' => $orderId,
                'gross_amount' => $booking->total_fee,
                'transaction_status' => 'pending'
            ]);

            // Prepare transaction details for Midtrans
            $transactionDetails = [
                'order_id' => $orderId,
                'gross_amount' => (int) $booking->total_fee,
            ];

            $itemDetails = [
                [
                    'id' => $booking->package_id,
                    'price' => (int) $booking->total_fee,
                    'quantity' => 1,
                    'name' => $booking->package->package_name ?? 'Travel Package',
                ]
            ];

            $customerDetails = [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
            ];

            $transactionData = [
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails,
            ];

            // Get Snap Token
            $snapToken = \Midtrans\Snap::getSnapToken($transactionData);

            return view('user.payment.checkout', compact('booking', 'payment', 'snapToken'));

        } catch (\Exception $e) {
            Log::error('Payment creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal membuat pembayaran. Silakan coba lagi.');
        }
    }

    public function paymentCallback(Request $request)
    {
        try {
            $serverKey = config('midtrans.server_key');
            $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
            
            if ($hashed !== $request->signature_key) {
                return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
            }

            $payment = Payment::where('order_id', $request->order_id)->first();
            
            if (!$payment) {
                return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
            }

            $booking = $payment->booking;

            // Update payment status
            $payment->update([
                'transaction_id' => $request->transaction_id,
                'payment_type' => $request->payment_type,
                'transaction_status' => $request->transaction_status,
                'fraud_status' => $request->fraud_status ?? null,
                'transaction_time' => $request->transaction_time,
                'midtrans_response' => $request->all(),
            ]);

            // Update booking status based on payment status
            switch ($request->transaction_status) {
                case 'capture':
                case 'settlement':
                    $booking->update([
                        'payment_status' => 'Success',
                        'reservation_status' => 'pending'
                    ]);
                    break;
                case 'pending':
                    $booking->update(['payment_status' => 'pending']);
                    break;
                case 'deny':
                case 'cancel':
                case 'expire':
                    $booking->update(['payment_status' => 'failed']);
                    break;
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Payment callback failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Callback processing failed'], 500);
        }
    }

    public function createQrisPayment(Request $request, $bookingId)
    {
        try {
            $booking = Booking::with(['user', 'package'])->findOrFail($bookingId);
            
            // Pastikan user yang login adalah pemilik booking
            if ($booking->user_id !== Auth::id()) {
                return redirect()->back()->with('error', 'Unauthorized access');
            }

            // Generate unique order ID
            $orderId = 'QRIS-' . $booking->id . '-' . time();

            // Create or get existing payment record
            $payment = Payment::where('booking_id', $booking->id)->first();
            
            if (!$payment) {
                $payment = Payment::create([
                    'booking_id' => $booking->id,
                    'order_id' => $orderId,
                    'gross_amount' => $booking->total_fee,
                    'transaction_status' => 'pending'
                ]);
            }

            // Generate QRIS string (in real implementation, this would come from payment gateway)
            $qrString = $this->generateQrisString($payment);

            return view('user.payment.qris', compact('booking', 'payment', 'qrString'));

        } catch (\Exception $e) {
            Log::error('QRIS payment creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal membuat pembayaran QRIS. Silakan coba lagi.');
        }
    }

    public function checkPaymentStatus(Request $request)
    {
        try {
            $orderId = $request->order_id;
            $payment = Payment::where('order_id', $orderId)->first();
            
            if (!$payment) {
                return response()->json(['status' => 'error', 'message' => 'Payment not found'], 404);
            }

            // In real implementation, check with payment gateway
            // For demo purposes, we'll simulate different statuses
            $statuses = ['pending', 'settlement', 'failed'];
            $randomStatus = $statuses[array_rand($statuses)];
            
            return response()->json([
                'status' => 'success',
                'payment_status' => $payment->transaction_status,
                'order_id' => $orderId
            ]);

        } catch (\Exception $e) {
            Log::error('Payment status check failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Status check failed'], 500);
        }
    }

    private function generateQrisString($payment)
    {
        // In real implementation, this would generate actual QRIS string from payment gateway
        // For demo purposes, we'll create a simple string
        $qrisData = [
            'merchant_id' => 'DILAGA_TOUR_001',
            'amount' => $payment->gross_amount,
            'order_id' => $payment->order_id,
            'timestamp' => time()
        ];
        
        return 'https://qris.online/payment/' . base64_encode(json_encode($qrisData));
    }

    public function paymentSuccess(Request $request)
    {
        $orderId = $request->order_id;
        
        if (!$orderId) {
            return redirect()->route('profile.Invoice')->with('error', 'Order ID tidak ditemukan');
        }
        
        $payment = Payment::where('order_id', $orderId)->with(['booking.package'])->first();
        
        if (!$payment) {
            return redirect()->route('profile.Invoice')->with('error', 'Payment tidak ditemukan');
        }

        // Pastikan user yang login adalah pemilik payment
        if ($payment->booking->user_id !== Auth::id()) {
            return redirect()->route('profile.Invoice')->with('error', 'Unauthorized access');
        }

        return view('user.payment.success', compact('payment'));
    }

    public function paymentFailed(Request $request)
    {
        $orderId = $request->order_id;
        
        if (!$orderId) {
            return redirect()->route('profile.Invoice')->with('error', 'Order ID tidak ditemukan');
        }
        
        $payment = Payment::where('order_id', $orderId)->with(['booking.package'])->first();
        
        if (!$payment) {
            return redirect()->route('profile.Invoice')->with('error', 'Payment tidak ditemukan');
        }

        // Pastikan user yang login adalah pemilik payment
        if ($payment->booking->user_id !== Auth::id()) {
            return redirect()->route('profile.Invoice')->with('error', 'Unauthorized access');
        }
        
        return view('user.payment.failed', compact('payment'));
    }
}