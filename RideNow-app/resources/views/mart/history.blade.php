<p>
    <a href="{{ route('mart.index') }}">
        Kembali ke Halaman Utama
    </a>
</p>

<hr>

<h1>RIWAYAT BELANJA MART</h1>

@if(session('success'))
    <p style="color: green;">
        <b>{{ session('success') }}</b>
    </p>
@endif

<table border="1"
       cellpadding="5"
       cellspacing="0"
       style="border: 3px solid black; border-collapse: collapse;">

    <thead>
        <tr style="background-color: lemonchiffon;">
            <th style="border: 3px solid black; width:50px;">
                No
            </th>

            <th style="border: 3px solid black; width:220px;">
                Tanggal Belanja
            </th>

            <th style="border: 3px solid black; width:220px;">
                Produk Yang Dibeli
            </th>

            <th style="border: 3px solid black; width:220px;">
                Total Pembayaran
            </th>

            <th style="border: 3px solid black; width:120px;">
                Status
            </th>
        </tr>
    </thead>

    <tbody>
        @forelse($histories as $history)
        <tr>
            <td style="text-align:center; border:3px solid black;">
                {{ $loop->iteration }}
            </td>

            <td style="border:3px solid black;">
                {{ $history->created_at->format('d M Y - H:i') }} WIB
            </td>

            <td style="border:3px solid black;">
                <strong>
                    {!! nl2br(e($history->items)) !!}
                </strong>
            </td>

            <td style="border:3px solid black;">
                Rp {{ number_format($history->total_price, 0, ',', '.') }}
            </td>

            <td style="border:3px solid black; text-align:center;">
                <span style="color: green;">
                    Selesai
                </span>
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="5"
                style="text-align:center; border:3px solid black;">
                Belum ada riwayat belanja.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>