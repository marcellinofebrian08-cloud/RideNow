<!DOCTYPE html>
<html>
<head>
    <title>Tracking Order - RideNow</title>
</head>
<body>

    <h1>RideNow Ordering send Page</h1>
    <hr>
    
    <h3>Status: <span style="color: blue;">{{ $order->status }}</span></h3>
    <p>Driver sedang mengambil pesanan dan menuju ke lokasi Anda!</p>
    <br>

    <label><b>Informasi Driver:</b></label><br>
    Nama Driver: {{ $order->driver_name }}<br>
    Plat Nomor: <b>{{ $order->plate_number }}</b>
    <br><br>

    <label><b>Rincian Rute:</b></label><br>
    • Nama Barang: {{ $order->item_name }}<br>
    • Nama Penerima: {{ $order->receiver_name }}<br>
    • Titik Jemput: {{ $order->pickup_location }}<br>
    • Titik Tujuan: {{ $order->destination }}<br>
    • Jarak Tempuh: {{ $order->distance }} KM<br>
    • Total Bayar: <b>Rp {{ number_format($order->price, 0, ',', '.') }}</b>
    <br><br>

    <form action="{{ route('send.cancel', $order->id) }}" method="POST">
        @csrf
        <input type="submit" value="Cancel Order" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
    </form>
    <br>

    <form action="{{ route('send.complete', $order->id) }}" method="POST">
        @csrf
        <input type="submit" value="Complete Order" onclick="return confirm('Apakah barang anda sudah sampai di tujuan dan ingin menyelesaikan pesanan?')">
    </form>

</body>
</html>