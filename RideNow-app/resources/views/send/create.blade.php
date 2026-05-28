<!DOCTYPE html>
<html>
<head>
    <title>RideNow - Send Item</title>
</head>
<body>

    <h1>RideNow Send Homepage</h1>

    <h3>Saldo Wallet</h3>
    <p>Rp {{ number_format($wallet->balance, 0, ',', '.') }}</p>

    <p>
        <a href="/wallet">Top Up Wallet</a>
    </p>

    <hr>

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <form method="POST" action="/send">
        @csrf

        <label>Nama Pengirim</label><br>
        <input type="text" name="sender_name" required>
        <br><br>

        <label>Nama Penerima</label><br>
        <input type="text" name="receiver_name" required>
        <br><br>

        <label>Nama Barang</label><br>
        <input type="text" name="item_name" required>
        <br><br>

        <label>Titik Awal Penjemputan</label><br>
        <input type="text" name="pickup_location" required>
        <br><br>

        <label>Titik Akhir / Destinasi</label><br>
        <input type="text" name="destination" required>
        <br><br>

        <label>Jarak / Distance (dalam KM) Rp4000/KM </label><br>
        <input type="number" name="distance" min="1" max="100" required>
        <br><br>

        <input type="submit" value="Pesan Sekarang">
    </form>

    <p><a href="/home">Kembali ke Dashboard</a></p>

</body>
</html>