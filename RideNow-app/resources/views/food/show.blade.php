<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu - {{ $restaurant->resto_name }}</title>
</head>
<body>
    <p>
        <a href="{{ route('food.index') }}">← Kembali ke Utama</a> | 
        <a href="{{ route('food.showReceipt') }}">🛒 Lihat Keranjang & Struk</a>
    </p>
    <hr>

  <hr>

@if(session('success'))
    <p style="color: green;">
        <b>{{ session('success') }}</b>
    </p>
@endif

@if(session('error'))
    <p style="color: red;">
        <b>{{ session('error') }}</b>
    </p>
@endif

<h1>{{ $restaurant->resto_name }}</h1>
    <p>Kategori: {{ $restaurant->category }} | Lokasi: {{ $restaurant->location }}</p>
    <hr>

    <h2>Menu Makanan:</h2>
    <ul>
        @foreach($restaurant->menus as $menu)
            <li>
                <table border="0" cellpadding="5">
                    <tr>
                        <td>
                            @if($menu->picture)
                                <img src="{{ asset($menu->picture) }}" alt="{{ $menu->menu_name }}" width="100" height="100" style="object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/100" alt="No Image" width="100" height="100">
                            @endif
                        </td>
                        <td>
                            <h3>{{ $menu->menu_name }}</h3>
                            <p>Harga: <strong>Rp {{ number_format($menu->price, 0, ',', '.') }}</strong></p>
                            
                            <form action="{{ route('food.addToCart', $menu->id) }}" method="POST">
                                @csrf
                                <button type="submit">Tambah ke Keranjang</button>
                            </form>
                        </td>
                    </tr>
                </table>
                <hr width="30%" align="left">
            </li>
        @endforeach
    </ul>
</body>
</html>