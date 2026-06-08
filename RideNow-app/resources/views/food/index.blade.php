<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Makanan</title>
</head>
<body>
    <h1>Layanan Pesan Antar Makanan</h1>
    <hr>

    <h3>Pilih Lokasi Pengantaran:</h3>
    <p>
        <a href="{{ route('food.index', ['location' => 'UNTAR']) }}" 
           style="{{ $pilih_lokasi == 'UNTAR' ? 'font-weight: bold; font-size: 18px; color: green;' : '' }}">
           [ UNTAR ]
        </a> 
        | 
        <a href="{{ route('food.index', ['location' => 'Rumah']) }}" 
           style="{{ $pilih_lokasi == 'Rumah' ? 'font-weight: bold; font-size: 18px; color: blue;' : '' }}">
           [ Rumah ]
        </a>
    </p>
    <p>Menampilkan restoran terdekat dari: <strong>{{ $pilih_lokasi }}</strong></p>
    <br>

    <h2>Daftar Restoran:</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Restoran</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $resto)
            <tr>
                <td><strong>{{ $resto->resto_name }}</strong></td>
                <td>{{ $resto->category }}</td>
                <td>
                    <a href="{{ route('food.show', $resto->id) }}">Lihat Menu</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <hr>
    <a href="{{ route('food.history') }}">Lihat Riwayat Pesanan</a>
    <p>
    <a href="/home" style="text-decoration: none; background-color:#f0f0f0; color: black; padding: 5px 10px; border: 1px solid #ccc; border-radius: 4px;">
        Kembali ke Dashboard
    </a>
</p>
<hr>
</body>
</html>