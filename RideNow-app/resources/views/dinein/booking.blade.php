<!DOCTYPE html>
<html>

<head>
    <title>Booking Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f5f5;">
        <div class="card p-4 rounded-4">
            <h3 class="mb-4">
                Booking {{ $restaurant->name }}
            </h3>
            <form action="/booking/store" method="POST">
                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                @csrf
                <div class="mb-3">
                    <label>Nama Customer</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" name="phone" class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Booking</label>
                    <input type="date" name="booking_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jumlah Orang</label>
                    <input type="number" name="total_people" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">
                    Booking Sekarang
                </button>
            </form>
        </div>
    </div>
</body>

</html>