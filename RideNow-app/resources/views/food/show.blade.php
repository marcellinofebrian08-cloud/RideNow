@if(session('success'))
    <p style="color: green;"><b>{{ session('success') }}</b></p>
@endif

@if(session('error'))
    <p style="color: red;"><b>{{ session('error') }}</b></p>
@endif

<h1>{{ $restaurant->resto_name }}</h1>
<p>Kategori: {{ $restaurant->category }} | Lokasi: {{ $restaurant->location }}</p>

<hr>
<h2>Menu Makanan:</h2>

@if($restaurant->menus->isEmpty())
    <p>Belum ada menu yang tersedia di restoran ini.</p>
@else
    <ul style="list-style-type: none; padding-left: 0;">
        @foreach($restaurant->menus as $menu)
            <li style="margin-bottom: 20px;">
                <table border="0" cellpadding="5" cellspacing="0">
                    <tr>
                        <td style="vertical-align: top; padding-right: 15px;">
                            @if($menu->picture)
                                <img src="{{ asset($menu->picture) }}" alt="{{ $menu->menu_name }}" width="100" height="100" style="object-fit: cover; border: 1px solid lightgray;">
                            @else
                                <img src="https://via.placeholder.com/100" alt="No Image" width="100" height="100" style="border: 1px solid lightgray;">
                            @endif
                        </td>
                        <td style="vertical-align: top;">
                            <h3 style="margin: 0 0 5px 0;">{{ $menu->menu_name }}</h3>
                            <p style="margin: 0 0 10px 0;">Harga: <strong>Rp {{ number_format($menu->price, 0, ',', '.') }}</strong></p>
                            
                            <form action="{{ route('food.addToCart', $menu->id) }}" method="POST">
                                @csrf
                                <button type="submit" style="padding: 5px 10px; cursor: pointer; background-color: pink ; border: 1px solid lightgray;">
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
                <hr width="30%" align="left" style="border: 0; border-top: 1px solid lightgray; margin-top: 15px;">
            </li>
        @endforeach
    </ul>
@endif

<p>
    <a href="{{ route('food.index') }}" style="text-decoration: none;">
        <button type="button" style="background-color: lightgreen; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer; margin-right: 10px;">
            Kembali ke Menu Utama
        </button>
    </a>
    
    <a href="{{ route('food.showReceipt') }}" style="text-decoration: none;">
        <button type="button" style="background-color: lightgreen; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer;">
            Lihat Keranjang & Struk
        </button>
    </a>
</p>
