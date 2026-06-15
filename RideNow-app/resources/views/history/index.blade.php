<!DOCTYPE html>
<html>
<head>
    <title>RideNow - History</title>
</head>
<body>
    <h1>History Transaksi</h1>
    @if($histories->isEmpty())
        <p>Belum ada history transaksi.</p>
    @else
        <table border="1" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Jenis Transaksi</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
            @foreach($histories as $history)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $history->transaction_type }}</td>
                    <td>{{ $history->description }}</td>
                    <td>Rp {{ number_format($history->amount, 0, ',', '.') }}</td>
                    <td>{{ $history->status }}</td>
                    <td>{{ $history->created_at }}</td>
                </tr>
            @endforeach
        </table>
    @endif
    <br>
    <p><a href="/home">Kembali ke Dashboard</a></p>
</body>
</html>