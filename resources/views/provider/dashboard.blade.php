<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Provider Dashboard') }}
        </h2>
    </x-slot>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="mb-3 text-end">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
   </div>
    <div class="py-5">
        <div class="container">
            <h3 class="mb-4">My Assigned Bookings</h3>

            @forelse($bookings as $booking)
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                                <p><strong>Customer Name:</strong> {{ $booking->customer->name }}</p>
                                <p><strong>Email:</strong> {{ $booking->customer->email }}</p>
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
                            </div>

                            <div class="col-md-4 text-end">
                                @if($booking->status === 'pending')
                                    <form action="/provider/bookings/{{ $booking->id }}/status" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" name="status" value="accepted" class="btn btn-success mb-2 w-100">
                                            Accept
                                        </button>

                                        <button type="submit" name="status" value="rejected" class="btn btn-danger w-100">
                                            Reject
                                        </button>
                                    </form>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    No bookings assigned to you yet.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
