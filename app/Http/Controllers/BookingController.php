<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\travelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{

    public function showLoginView()
    {
        
        return view ('auth.login'); 
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Retrieve logged-in user ID

        $bookings = Booking::withUserAndPackage()
                ->where('user_id', $userId)
                ->orderBy('created_at', 'DESC')
                ->get();
    
        return view('profile.booking', compact('bookings')); // Pass data to the view
        
    }

    // this function show details for admin
    public function showAllBookingData()
    {  

        // count number for Reservation
        $pendingCountReservation = Booking::where('reservation_status', 'pending')->count();
        $conformCountReservation = Booking::where('reservation_status', 'Conform')->count();
        $rejectedCountReservation = Booking::where('reservation_status', 'Reject')->count();
        $allReservation = Booking::whereIn('reservation_status', ['pending', 'Conform', 'Reject'])->count();

        // count number for payment
        $pendingCountPayment = Booking::where('payment_status', 'pending')->count();
        $conformCountPayment = Booking::where('payment_status', 'Success')
        ->where('reservation_status', 'pending')
        ->count();
        $rejectedCountPayment = Booking::where('payment_status', 'Reject')->count();


        $userId = Auth::id(); // Retrieve logged-in user ID
        $bookings = Booking::withUserAndPackage()
                ->orderBy('created_at', 'DESC')
                ->get();
    
        return view('admin.bookingDetails', compact('bookings','pendingCountReservation', 'conformCountReservation', 'rejectedCountReservation',
        'pendingCountPayment','conformCountPayment','rejectedCountPayment','allReservation')); // Pass data to the view

    }

    // for Admin
    public function showOneUserBookingDataAll($id)
    {
        $bookings = Booking::withUserAndPackage()
                ->where('id', $id)
                ->orderBy('created_at', 'DESC')
                ->get();
                // dd($bookings); // Dump the bookings to check data //this is used for data correckly pass to the view
        return view('admin.adminBookingDetailsPage', compact('bookings')); // Pass data to the view    
    }

        /**
     * Display a invoice massage.
     */
    public function indexInvoice()
    {
        $userId = Auth::id(); // Retrieve logged-in user ID
        $bookings = Booking::withUserAndPackage()
                ->where('user_id', $userId)
                ->orderBy('created_at', 'DESC')
                ->get();
    
        return view('profile.invoice', compact('bookings')); // Pass data to the view
    }

    //show user invoice details
    public function invoiceDetails($id)
    {
        $booking = Booking::withUserAndPackage()
                ->where('id', $id)
                ->orderBy('created_at', 'DESC')
                ->first();

                // dd($bookings); // Dump the bookings to check data //this is used for data correckly pass to the view
        return view('profile.profileInvoiceDetails', compact('booking')); // Pass data to the view    
    }

    // NEW: Show booking form
    public function showBookingForm(travelPackage $travelPackage)
    {
        return view('user.booking.form', compact('travelPackage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules =[     
            'date' => 'required|date',
            'number_of_adult' => 'required|integer',
            'number_of_child' => 'required|integer',
            'pick_up_location' => 'required|string',
            'pick_up_location_details' => 'required|string',
            'total_fee' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(),  $rules);
        //to show massages | check validate
        if ($validator->fails()) {
            return redirect()->route('user.packagePage')->withErrors($validator)->withInput();
        }

        //to store data code here
        // 1. connect with the model
        $bookings = new booking();

        $userId = Auth::id(); // Retrieve logged-in user ID

        //set the attribute

        //foring keys
        $bookings->user_id = $userId;
        $bookings-> package_id = $request->package_id;

        $bookings->date = $request->date;
        $bookings->number_of_adult = $request->number_of_adult;
        $bookings->number_of_child = $request->number_of_child;
        $bookings->pick_up_location = $request->pick_up_location;
        $bookings->pick_up_location_details = $request->pick_up_location_details;
        $bookings->total_fee = $request->total_fee;
        $bookings->save();
        
        // Process the validated data, such as saving it to the database
        return redirect()->route('profile.Booking')->with('success', 'Travel Package Booking successfully');
        
    }

    //user payment_receipt upload
    public function paymentReceiptImage(Request $request, $id)
    {
        $rules = [
            'payment_receipt_image' => 'required|image|mimes:jpeg,png,jpg,pdf|max:5120', // Max 5MB
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->route('profile.showInvoiceDetails', ['id' => $id])
                           ->withErrors($validator)
                           ->withInput();
        }
        
        // Find the existing booking record
        $booking = Booking::findOrFail($id);
        
        // Verify user owns this booking
        if ($booking->user_id !== Auth::id()) {
            return redirect()->route('profile.Invoice')
                           ->with('error', 'Unauthorized access');
        }

        // Handle file upload
        if ($request->hasFile('payment_receipt_image')) {
            $file = $request->file('payment_receipt_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            
            // Move file to public directory
            $file->move(public_path('image/uploads/payment-recipt'), $filename);
            
            // Update booking record
            $booking->payment_receipt_image = $filename;
            $booking->payment_status = 'pending'; // Keep as pending until admin approval
            $booking->save();
        }

        return redirect()->route('profile.showInvoiceDetails', ['id' => $id])
                       ->with('success', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi admin.');
    }

        //user payment_receipt accept and conform booking for admin function
        public function paymentReceiptImageAcccept(Request $request, $id)
        {
            
              // Find the existing booking record
            $booking = Booking::find($id);
            $booking->payment_status = 'Success';
            $booking->reservation_status = 'Conform';
            $booking->save();

            // Process the validated data, such as saving it to the database
            return redirect()->route('admin.showOneUserBookingDataAll', ['id' => $id])->with('success', 'Booking confirmed');
            
        }

        //user payment_receipt reject and reject booking for admin function
        public function paymentReceiptImageReject(Request $request, $id)
        {
            
              // Find the existing booking record
            $booking = Booking::find($id);
            $booking->payment_status = 'Reject';
            $booking->reservation_status = 'Reject';
            $booking->save();

            // Process the validated data, such as saving it to the database
            return redirect()->route('admin.showOneUserBookingDataAll', ['id' => $id])->with('success', 'Booking Rejected');
            
        }

}