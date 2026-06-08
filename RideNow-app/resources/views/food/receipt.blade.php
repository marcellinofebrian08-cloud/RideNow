<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Belanja</title>
</head>
<body>
    <h1>STRUK BELANJA ANDA</h1>
    <hr>

    @if(session('error'))
        <p style="color: red; font-weight: bold;">{{ session('error') }}</p>
    @endif

    @if(empty($cart))
        <p>Keranjang kosong.</p>
        <a href="{{ route('food.index') }}">Kembali</a>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th> </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                <tr>
                    <td>
                        @if($item['picture'])
                            <img src="{{ asset($item['picture']) }}" width="50" height="50" style="object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/50" width="50" height="50">
                        @endif
                    </td>
                    <td>{{ $item['menu_name'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>{{ $item['quantity'] }} porsi</td>
                    <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('food.removeItem', $id) }}" style="color: white; background-color: red; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px; font-weight: bold;">
                            ❌ Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <br>
        <h3>Informasi Wallet Asli:</h3>
        <p>Saldo Wallet Anda: <strong>Rp {{ number_format($saldo_sekarang, 0, ',', '.') }}</strong></p>

        <br>
        <h3>Rincian Biaya:</h3>
        <p>Total Makanan: Rp {{ number_format($total_harga_makanan, 0, ',', '.') }}</p>
        <p>Ongkos Kirim: Rp {{ number_format($ongkir, 0, ',', '.') }}</p>
        <p><strong>Total Akhir: Rp {{ number_format($harga_akhir, 0, ',', '.') }}</strong></p>

        @if($saldo_cukup)
            <form action="{{ route('food.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="resto_name" value="Restoran Pilihan Driver">
                <button type="submit" style="background-color: green; color: white; padding: 10px; cursor: pointer; font-weight: bold;">✔️ BAYAR PAKAI WALLET & PESAN</button>
            </form>
        @else
            <div style="background-color:#ffcccc; color:#cc0000; padding: 10px; display: inline-block; border: 1px solid red;">
                Saldo Wallet Anda tidak cukup! Silakan isi saldo terlebih dahulu.
            </div>
            <br><br>
            <a href="{{ route('wallet.index') }}" style="background-color: blue; color: white; padding: 10px 15px; text-decoration: none; display: inline-block; font-weight: bold;">Pergi ke Halaman Top Up Saldo</a>
        @endif

        <br><br>
        <a href="{{ route('food.clearCart') }}" style="color: red;">Kosongkan Keranjang</a>
    @endif
</body>
</html>