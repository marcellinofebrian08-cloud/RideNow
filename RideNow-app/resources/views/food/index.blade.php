<h1>RideNow Food</h1>

<h3>Pilih Lokasi Pengantaran</h3>
<p>
    <a href="{{ route('food.index', ['location' => 'UNTAR']) }}" style="text-decoration: none;">
       <button type="button" style="{{ $pilih_lokasi == 'UNTAR' ? 'font-weight: bold; background-color:lightpink; color: maroon; border: 2px solid maroon;' : 'background-color:white; border: 1px solid lightgray;' }} padding: 5px 15px; cursor: pointer;">
            UNTAR
        </button>
    </a> 
     
    <a href="{{ route('food.index', ['location' => 'Rumah']) }}" style="text-decoration: none;">
       <button type="button" style="{{ $pilih_lokasi == 'Rumah' ? 'font-weight: bold; background-color:lightcyan; color: lightseagreen; border: 2px solid lightseagreen;' : 'background-color: white; border: 1px solid lightgray;' }} padding: 5px 15px; cursor: pointer;">
            Rumah
        </button>
    </a>
</p>
<p>Menampilkan restoran terdekat dari: <strong>{{ $pilih_lokasi }}</strong></p>

<h2>Daftar Restoran:</h2>

@if($restaurants->isEmpty())
    <p>Belum ada restoran yang tersedia di lokasi ini.</p>
@else
    <table border="1" cellpadding="5" cellspacing="0" style="border: 3px solid black; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 3px solid black; background-color: lemonchiffon;">
                <th style="width: 50px; border: 3px solid black;">No</th>
                <th style="width: 300px; border: 3px solid black;">Nama Restoran</th>
                <th style="width: 150px; border: 3px solid black;">Kategori</th>
                <th style="width: 120px; border: 3px solid black;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $resto)
                <tr>
                    <td style="text-align: center; border: 3px solid black;">{{ $loop->iteration }}</td>
                    <td style="border: 3px solid black;"><strong>{{ $resto->resto_name }}</strong></td>
                    <td style="border: 3px solid black;">{{ $resto->category }}</td>
                    <td style="text-align: center; border: 3px solid black;">
                        <a href="{{ route('food.show', $resto->id) }}" style="text-decoration: none;">Lihat Menu</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<br>
<p>
    <a href="{{ route('food.history') }}" style="text-decoration: none;">
        <button type="button" style="background-color: plum; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer; margin-right: 10px;">
            Lihat Riwayat Pesanan
        </button>
    </a>
    
    <a href="/home" style="text-decoration: none;">
        <button type="button" style="background-color: plum; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer;">

            Kembali ke Dashboard
        </button>
    </a>
</p>