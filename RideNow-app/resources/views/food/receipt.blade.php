<h1>STRUK BELANJA</h1>

@if(session('error'))
    <p style="color: red; font-weight: bold;">{{ session('error') }}</p>
@endif

@if(empty($cart))
    <p>Keranjang kosong.</p>
    <br>
    <a href="{{ route('food.index') }}" style="text-decoration: none;">
        <button type="button" style="background-color: white; border: 1px solid # lightgray; padding: 6px 12px; cursor: pointer;">
            Kembali
        </button>
    </a>
@else
    <table border="1" cellpadding="5" cellspacing="0" style="border: 2px solid black; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 2px solid black; background-color: lemonchiffon">
                <th style="width: 50px; border: 2px solid black;">No</th>
                <th style="width: 80px; border: 2px solid black;">Gambar</th>
                <th style="width: 250px; border: 2px solid black;">Nama Makanan</th>
                <th style="width: 120px; border: 2px solid black;">Harga</th>
                <th style="width: 100px; border: 2px solid black;">Jumlah</th>
                <th style="width: 120px; border: 2px solid black;">Total</th>
                <th style="width: 100px; border: 2px solid black;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
                <tr>
                    <td style="text-align: center; border: 2px solid black;">{{ $loop->iteration }}</td>
                    <td style="text-align: center; border: 2px solid black;">
                        @if($item['picture'])
                            <img src="{{ asset($item['picture']) }}" width="50" height="50" style="object-fit: cover; border: 1px solid lightgray;">
                        @else
                            <img src="https://via.placeholder.com/50" width="50" height="50" style="border: 1px solid lightgray;">
                        @endif
                    </td>
                    <td style="border: 2px solid black;">{{ $item['menu_name'] }}</td>
                    <td style="border: 2px solid black;">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td style="text-align: center; border: 2px solid black;">{{ $item['quantity'] }} porsi</td>
                    <td style="border: 2px solid black;">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    <td style="text-align: center; border: 2px solid black;">
                        <a href="{{ route('food.removeItem', $id) }}" style="text-decoration: none;">
                            <button type="button" style="background-color: red; color: white; border: none; padding: 6px 16px; border-radius: 12px; font-weight: bold; cursor: pointer; font-size: 14px; display: inline-flex; align-items: center; justify-content: center; gap: 4px;">
                                Hapus
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr style="border: 0; border-top: 1px solid # lightgray; margin: 15px 0;">

    <h3>Informasi Wallet Asli:</h3>
    <p>Saldo Wallet Anda: <strong>Rp {{ number_format($saldo_sekarang, 0, ',', '.') }}</strong></p>

    <h3>Rincian Biaya:</h3>
    <p>Total Makanan: Rp {{ number_format($total_harga_makanan, 0, ',', '.') }}</p>
    <p>Ongkos Kirim: Rp {{ number_format($ongkir, 0, ',', '.') }}</p>
    <p><strong>Total Akhir: Rp {{ number_format($harga_akhir, 0, ',', '.') }}</strong></p>

    <br>
    @if($saldo_cukup)
        <form action="{{ route('food.checkout') }}" method="POST">
            @csrf
            <button type="submit" style="background-color: green; color: white; padding: 10px 15px; border: 1px solid darkgreen; cursor: pointer; font-weight: bold;">
                BAYAR PAKAI WALLET & PESAN
            </button>
        </form>
    @else
        <div style="background-color: white; color: red; padding: 10px; display: inline-block; border: 1px solid red; font-weight: bold; margin-bottom: 15px;">
            Saldo Wallet Anda tidak cukup! Silakan isi saldo terlebih dahulu.
        </div>
        <br>
        <a href="{{ route('wallet.index') }}" style="text-decoration: none;">
            <button type="button" style="background-color: blue; color: white; padding: 10px 15px; border: 1px solid darkblue; cursor: pointer; font-weight: bold;">
                Pergi ke Halaman Top Up Saldo
            </button>
        </a>
    @endif

    <hr style="border: 0; border-top: 1px solid lightgray; margin: 15px 0;">
    
    <a href="{{ route('food.clearCart') }}" style="text-decoration: none;">
        <button type="button" style="background-color: mistyrose; color: red; border: 1px solid red; padding: 6px 12px; cursor: pointer;">
            Kosongkan Keranjang
        </button>
    </a>
    
    <a href="{{ route('food.index') }}" style="text-decoration: none; margin-left: 10px;">
        <button type="button" style="background-color: powderblue; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer;">
            Kembali Pilih Makanan
        </button>
    </a>
@endif