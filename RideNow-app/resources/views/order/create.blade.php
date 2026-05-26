<!DOCTYPE html>
<html>
<head>
    <title>RideNow - Book a Ride</title>
</head>
<body>

    <h1>RideNow Order Homepage</h1>

    <h3>Saldo Wallet</h3>
    <p>Rp {{ number_format($wallet->balance, 0, ',', '.') }}</p>

    <p>
        <a href="/wallet">Top Up Wallet</a>
    </p>

    <hr>

    @if(session('success'))
        <script>
            alert("{{ session('success') }}\n\nPickup Point: {{ session('pickup') }}\nDestination: {{ session('destination') }}\nDistance: {{ session('distance') }} KM\nPrice: Rp {{ number_format(session('price'), 0, ',', '.') }}");
        </script>
    @endif

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <form method="POST" action="/ride">
        @csrf

        <label>Nama Penumpang</label><br>
        <input type="text" name="passenger_name" required>
        <br><br>

        <label>Titik Awal Penjemputan</label><br>
        <input type="text" name="pickup_location" required>
        <br><br>

        <label>Titik Akhir / Destinasi</label><br>
        <input type="text" name="destination" required>
        <br><br>

        <label>Jarak / Distance (dalam KM)</label><br>
        <input type="number" name="distance" min="1" max="100" required>
        <br><br>

        <label>Jenis Kendaraan</label><br>
        <input type="radio" name="ride_type" value="Bike" checked> RideNow Bike (Rp 3.000 / KM)<br>
        <input type="radio" name="ride_type" value="Car"> RideNow Car (Rp 6.000 / KM)
        <br><br>

        <input type="submit" value="Pesan Sekarang">
    </form>

    <p><a href="/home">Kembali ke Dashboard</a></p>

</body>
</html>