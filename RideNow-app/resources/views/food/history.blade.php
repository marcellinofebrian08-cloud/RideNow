<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>History Pesanan</title>
</head>
<body>
    <p><a href="{{ route('food.index') }}">← Kembali ke Utama</a></p>
    <hr>

    <h1>RIWAYAT PESANAN (HISTORY)</h1>

    @if(session('success'))
        <p style="color: green;"><b>{{ session('success') }}</b></p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Nama Restoran</th>
                <th>Total Pembayaran (Harga Akhir)</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $index => $history)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $history->created_at->format('d M Y - H:i') }} WIB</td>
                <td><strong>{{ $history->resto_name }}</strong></td>
                <td>Rp {{ number_format($history->total_price, 0, ',', '.') }}</td>
                <td><span style="color: green;">Selesai</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Belum ada riwayat pemesanan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>