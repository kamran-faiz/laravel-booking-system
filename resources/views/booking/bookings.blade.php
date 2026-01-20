<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-5">
        <div class="container">
            <h3 class="mb-4">All of your Bookings</h3>
            <a href="/booking/create" class="btn btn-primary mb-3">Create New Booking</a>


            @forelse($bookings as $booking)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                                <p><strong>Date:</strong> {{ $booking->booking_date }}</p>
                                <p><strong>Time:</strong> {{ $booking->booking_time }}</p>
                                <p>
                                    <strong>Status:</strong>
                                    <span class="badge 
                                        @if($booking->status === 'pending') bg-warning
                                        @elseif($booking->status === 'accepted') bg-success
                                        @else bg-danger
                                        @endif">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </p>
                                <p><strong>Provider:</strong> {{ $booking->provider->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    You have not made any bookings yet.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
