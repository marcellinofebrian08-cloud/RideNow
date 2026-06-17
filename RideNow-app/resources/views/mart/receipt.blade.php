<h1>STRUK BELANJA MART</h1>

@if(session('error'))
    <p style="color: red;">
        <b>{{ session('error') }}</b>
    </p>
@endif

@if(empty($cart))

    <p>Keranjang belanja kosong.</p>

    <a href="{{ route('mart.index') }}">
        Kembali ke Halaman Utama
    </a>
@else
    <table border="1"
           cellpadding="5"
           cellspacing="0"
           style="border: 3px solid black; border-collapse: collapse;">
        <thead>

            <tr style="background-color: lemonchiffon;">
                <th style="border: 3px solid black;">
                    Gambar
                </th>

                <th style="border: 3px solid black;">
                    Nama Barang
                </th>

                <th style="border: 3px solid black;">
                    Harga
                </th>

                <th style="border: 3px solid black;">
                    Jumlah
                </th>

                <th style="border: 3px solid black;">
                    Total
                </th>

                <th style="border: 3px solid black;">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>

                <td style="border: 3px solid black; text-align:center;">
                    @if($item['picture'])

                        <img src="{{ asset($item['picture']) }}"
                             width="60"
                             height="60"
                             style="object-fit: contain;">
                    @else
                        Tidak Ada Gambar
                    @endif
                </td>

                <td style="border: 3px solid black;">
                    {{ $item['product_name'] }}
                </td>

                <td style="border: 3px solid black;">
                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                </td>

                <td style="border: 3px solid black; text-align:center;">
                    {{ $item['quantity'] }}
                </td>

                <td style="border: 3px solid black;">
                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                </td>

                <td style="border: 3px solid black; text-align:center;">
                    <a href="{{ route('mart.removeItem', $id) }}"
                       style="
                            color: white;
                            background-color: red;
                            padding: 5px 10px;
                            text-decoration: none;
                            border-radius: 4px;
                       ">
                        Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h3>Informasi Wallet:</h3>

    <p>
        Saldo Wallet:
        <strong>
            Rp {{ number_format($saldo_sekarang, 0, ',', '.') }}
        </strong>
    </p>

    <hr>

    <h3>Rincian Pembayaran:</h3>

    <p>
        Total Belanja:
        Rp {{ number_format($total_harga_barang, 0, ',', '.') }}
    </p>

    <p>
        Biaya Pengiriman:
        Rp {{ number_format($ongkir, 0, ',', '.') }}
    </p>

    <p>
        <strong>
            Total Akhir:
            Rp {{ number_format($harga_akhir, 0, ',', '.') }}
        </strong>
    </p>

    @if($saldo_cukup)
        <form action="{{ route('mart.checkout') }}"
              method="POST">
            @csrf

            <button type="submit"
                    style="
                        background-color: green;
                        color: white;
                        padding: 10px;
                        cursor: pointer;
                        font-weight: bold;
                    ">
                BAYAR PAKAI WALLET & PESAN 
            </button>
        </form>
    @else
        <div style="
            background-color:#ffcccc;
            color:#cc0000;
            padding:10px;
            border:1px solid red;
            display:inline-block;
        ">
            Saldo wallet tidak mencukupi.
        </div>

        <br><br>

        <a href="{{ route('wallet.index') }}"
           style="
                background-color: blue;
                color: white;
                padding: 10px 15px;
                text-decoration: none;
                font-weight: bold;
           ">
            Pergi ke Halaman Top Up
        </a>
    @endif
    
    <br><br>

    <a href="{{ route('mart.clearCart') }}"
       style="color:red;">
        Kosongkan Keranjang
    </a>
@endif  