@extends('layouts.guest')

@section('content')
<div class="container">
    <h2>Invoice #{{ $booking->id }}</h2>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Travel Package:</strong> {{ $booking->travelPackage->package_name }}</p>
            <p><strong>Check In:</strong> {{ $booking->check_in }}</p>
            <p><strong>Check Out:</strong> {{ $booking->check_out }}</p>
            <p><strong>Total Person:</strong> {{ $booking->total_person }}</p>
            <p><strong>Total Price:</strong> Rp{{ number_format($booking->total_price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        </div>
    </div>

    @if($booking->payment_receipt)
        <div class="mt-3">
            <img src="{{ Storage::url($booking->payment_receipt) }}" alt="Payment Receipt" class="img-fluid">
        </div>
    @endif

    @if($booking->status == 'pending')
        <form action="{{ route('user.payment.receipt.image', $booking) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="payment_receipt">Upload Payment Receipt</label>
                <input type="file" name="payment_receipt" id="payment_receipt" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload Receipt</button>
        </form>
    @endif
</div>
@endsection