@extends('layouts.guest')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Add New Package</h5>
                    <a href="{{ route('admin.addPackage.create') }}" class="btn btn-primary">Add Package</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection