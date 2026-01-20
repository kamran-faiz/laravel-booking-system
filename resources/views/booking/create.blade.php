<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body">
                <div class="mb-3">
    <a href="/booking/bookings" class="btn btn-secondary">Back to My Bookings</a>
</div>

                    
                    <h3 class="mb-4 text-center">Create Booking</h3>

                    <form action="/booking/store" method="POST">
                        @csrf

                        <!-- Provider -->
                        <div class="mb-3">
                            <label class="form-label">Choose Provider</label>
                            <select name="provider_id" class="form-select" required>
                                <option value="">-- Select Provider --</option>
                                @foreach($providers as $provider)
                                    <option value="{{ $provider->id }}">
                                        {{ $provider->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label class="form-label">Booking Date</label>
                            <input type="date" name="booking_date" class="form-control" required>
                        </div>

                        <!-- Time -->
                        <div class="mb-3">
                            <label class="form-label">Booking Time</label>
                            <input type="time" name="booking_time" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Create Booking
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
