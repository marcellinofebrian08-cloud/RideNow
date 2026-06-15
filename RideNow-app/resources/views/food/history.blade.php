<h1>RIWAYAT PESANAN</h1>

@if(session('success'))
    <p style="color: green;"><b>{{ session('success') }}</b></p>
@endif

<a href="{{ route('food.index') }}">← Kembali ke Utama</a>
<br><br>

@if ($histories->isEmpty())
    <p>Belum ada riwayat pemesanan.</p>
@else
    <table border="3" cellpadding="5" cellspacing="0" style="border: 3px solid black; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 2px solid black;">
                <th style="width: 50px">No</th>
                <th style="width: 150px">Tanggal Order</th>
                <th style="width: 200px">Nama Restoran</th>
                <th style="width: 180px">Total</th>
                <th style="width: 100px">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($histories as $history)
                <tr style="border-bottom: 2px solid black;">
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $history->created_at->format('d M Y - H:i') }} WIB</td>
                    <td><strong>{{ $history->resto_name }}</strong></td>
                    <td>Rp {{ number_format($history->total_price, 0, ',', '.') }}</td>
                    <td style="text-align: center"><span style="color: green;">Selesai</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif