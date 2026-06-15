<!DOCTYPE html>
<html>
<head>
    <title>Tracking Order - RideNow</title>
</head>
<body>

    <h1>RideNow Ordering ride Page</h1>

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

    <h3>Status: <span style="color: blue;">{{ $order->status }}</span></h3>
    <p>Driver sedang mengambil pesanan dan menuju ke lokasi Anda</p>
    <hr><br>

    <label>Nama Driver</label><br>
    <input type="text" value="{{ $order->driver_name }}" readonly>
    <br><br>

    <label>Jenis Kendaraan</label><br>
    <input type="text" value="{{ $order->ride_type }}" readonly>
    <br><br>

    <label>Plat Nomor</label><br>
    <input type="text" value="{{ $order->plate_number }}" readonly style="font-weight: bold;">
    <br><br>

    <label>Titik Awal Penjemputan</label><br>
    <input type="text" value="{{ $order->pickup_location }}" readonly>
    <br><br>

    <label>Titik Akhir / Destinasi</label><br>
    <input type="text" value="{{ $order->destination }}" readonly>
    <br><br>

    <label>Jarak / Distance (dalam KM)</label><br>
    <input type="text" value="{{ $order->distance }} KM" readonly>
    <br><br>

    <label>Total Bayar</label><br>
    <input type="text" value="Rp {{ number_format($order->price, 0, ',', '.') }}" readonly>
    <br><br>

    <form method="POST" action="{{ route('order.cancel', $order->id) }}" style="display: inline-block; margin-right: 10px;">
        @csrf
        <input type="submit" value="Cancel Order" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini dan me-refund saldo?')">
    </form>

    <form method="POST" action="{{ route('order.complete', $order->id) }}" style="display: inline-block;">
        @csrf
        <input type="submit" value="Complete Order" onclick="return confirm('Apakah Anda sudah sampai di tujuan dan ingin menyelesaikan pesanan?')">
    </form>

    <p><a href="/ride">Kembali ke Pemesanan</a></p>

</body>
</html>