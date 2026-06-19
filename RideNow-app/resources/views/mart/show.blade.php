<p>
    <a href="{{ route('mart.index') }}">
        Kembali ke Kategori
    </a>
    |
    <a href="{{ route('mart.showReceipt') }}">
        Lihat Keranjang & Struk
    </a>
</p>

<hr>

<h1>{{ $category->category_name }}</h1>

<h3>Daftar Produk:</h3>

@if($products->isEmpty())
    <p>Belum ada produk pada kategori ini.</p>
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
                    Nama Produk
                </th>

                <th style="border: 3px solid black;">
                    Harga
                </th>

                <th style="border: 3px solid black;">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
            <tr>

                <td style="border: 3px solid black; text-align:center;">
                    @if($product->picture)
                        <img
                            src="{{ asset($product->picture) }}"
                            alt="{{ $product->product_name }}"
                            width="120"
                            height="120"
                            style="object-fit: contain;">
                    @else
                        Tidak Ada Gambar
                    @endif
                </td>

                <td style="border: 3px solid black;">
                    <strong>
                        {{ $product->product_name }}
                    </strong>

                </td>

                <td style="border: 3px solid black;">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </td>

                <td style="border: 3px solid black; text-align:center;">
                    <form action="{{ route('mart.addToCart', $product->id) }}"
                          method="POST">
                        @csrf
                        <button
                            type="submit"
                            style="
                                background-color: lightgreen;
                                border: 1px solid gray;
                                padding: 5px 10px;
                                cursor: pointer;
                            ">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif