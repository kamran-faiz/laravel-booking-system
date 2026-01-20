@extends('admin.layout')

@section('content')
<h1 class="mb-4">All Users</h1>

@forelse($users as $user)
<div class="card mb-3 shadow-sm">
    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
        <div>
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
        </div>

        <div class="d-flex gap-2 flex-wrap">
            {{-- Delete Button --}}
            <form action="/admin/users/{{ $user->id }}" method="POST" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>

            {{-- Update Role Dropdown --}}
            <form action="/admin/users/{{ $user->id }}/role" method="POST" class="d-flex align-items-center gap-1 m-0">
                @csrf
                @method('PATCH')
                <select name="role" class="form-select form-select-sm">
                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                    <option value="provider" {{ $user->role == 'provider' ? 'selected' : '' }}>Provider</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>
</div>
@empty
<div class="alert alert-info">No users found.</div>
@endforelse
@endsection
