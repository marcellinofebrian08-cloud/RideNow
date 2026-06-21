<!DOCTYPE html>
<html>

<head>
    <title>Booking Transit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <h3>Booking {{ $transit->name }}</h3>
    <div style="background:#f0f0f0;padding:10px;border-radius:8px;margin-bottom:15px;">
        <strong>Saldo Wallet:</strong>
        Rp {{ number_format($wallet->balance, 0, ',', '.') }}
    </div>
    <p>
        Harga Tiket:
        Rp {{ number_format($transit->price, 0, ',', '.') }}
    <p><a href="/home">Kembali ke Dashboard</a></p>
    </p>
</head>

<body>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="container mt-4">
        <div class="card p-4">
            <h3>
                Booking {{ $transit->name }}
            </h3>
            <form action="/transit/booking/store" method="POST">
                @csrf
                <input
                    type="hidden"
                    name="transit_id"
                    value="{{ $transit->id }}">
                <div class="mb-3">
                    <label>Nama Customer</label>
                    <input
                        type="text"
                        name="customer_name"
                        class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label>No HP</label>
                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Berangkat</label>
                    <input
                        type="date"
                        name="booking_date"
                        class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label>Jumlah Penumpang</label>
                    <input
                        type="number"
                        name="total_passenger"
                        class="form-control"
                        required>
                </div>
                <button class="btn btn-success">
                    Booking Sekarang
                </button>
            </form>
        </div>
    </div>
</body>

</html>