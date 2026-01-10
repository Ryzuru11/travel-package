@extends('layouts.guest')

@section('content')
<div class="container">
    <h2>Book {{ $travelPackage->package_name }}</h2>

    <form action="{{ route('package.book.store', $travelPackage) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="check_in">Check In</label>
            <input type="date" name="check_in" id="check_in" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="check_out">Check Out</label>
            <input type="date" name="check_out" id="check_out" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="total_person">Total Person</label>
            <input type="number" name="total_person" id="total_person" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection