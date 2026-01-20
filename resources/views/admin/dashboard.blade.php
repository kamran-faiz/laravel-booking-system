@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <h1>Admin Dashboard</h1>
        <p>Welcome, <strong>{{ auth()->user()->name }}</strong></p>
    </div>
</div>

<div class="row">
    {{-- Users Card --}}
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View, update roles, or delete registered users.</p>
                </div>
                <a href="{{ url('/admin/users') }}" class="btn btn-primary mt-2">Go to Users</a>
            </div>
        </div>
    </div>
</div>
@endsection
