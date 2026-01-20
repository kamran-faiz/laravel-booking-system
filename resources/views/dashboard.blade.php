<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h4 class="mb-3">Welcome 👋</h4>
                            <p class="text-muted mb-4">
                                Manage your bookings from here
                            </p>

                            <div class="d-grid gap-3">
                                <a href="/booking/create" class="btn btn-primary btn-lg">
                                    Create a Booking
                                </a>

                                <a href="/booking/bookings" class="btn btn-outline-secondary btn-lg">
                                    View My Bookings
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
