<!DOCTYPE html>
<html>
<head>
    <title>Pusat Bantuan - RideNow</title>
    <style>
        body { font-family: Arial; background-color: #f5f5f5; margin: 0; padding: 0; }
        .header { background-color: red; color: white; padding: 20px; }
        .container { padding: 20px; }
        .box { background-color: white; padding: 20px; margin-bottom: 20px; border-radius: 10px; }
        .btn-submit { background-color: red; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .alert { padding: 15px; background-color: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 20px; font-weight: bold;}
    </style>
</head>
<body>
    <div class="header">
        <h1>Pusat Bantuan RideNow</h1>
    </div>
    
    <div class="container">
        <a href="/home" style="color: black; text-decoration: none; margin-bottom: 20px; display: block;"> Kembali ke Home</a>
        
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="box">
            <h3>Kirim Laporan Baru</h3>
            <form action="{{ route('support.store') }}" method="POST">
                @csrf
                <p style="margin-bottom: 5px;">Kendala pada layanan apa?</p>
                <select name="subject" style="padding: 10px; width: 100%; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;">
                    <option value="RideNow Motor/Car">Kendala RideNow Motor/Car</option>
                    <option value="RideNow Food">Kendala Pesanan Food</option>
                    <option value="Topup Wallet">Kendala Top Up Wallet</option>
                    <option value="Akun & Lainnya">Kendala Akun & Lainnya</option>
                </select>
                
                <p style="margin-bottom: 5px;">Jelaskan detail kendala Anda:</p>
                <textarea name="message" rows="5" style="width: 100%; margin-bottom: 15px; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;" required placeholder="Misal: Driver atas nama Budi tidak kunjung datang..."></textarea>
                
                <button type="submit" class="btn-submit">Kirim Laporan</button>
            </form>
        </div>

        <div class="box">
            <h3>Riwayat Laporan Saya</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Waktu Lapor</th>
                        <th>Kategori Layanan</th>
                        <th>Pesan Keluhan</th>
                        <th>Status Bantuan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($tickets) > 0)
                        @foreach($tickets as $t)
                        <tr>
                            <td>{{ $t->created_at->format('d-M-Y H:i') }}</td>
                            <td>{{ $t->subject }}</td>
                            <td>{{ $t->message }}</td>
                            <td style="color: {{ $t->status == 'open' ? 'red' : 'green' }}; font-weight: bold;">
                                {{ $t->status == 'open' ? 'Menunggu Balasan' : 'Selesai Ditangani' }}
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" style="text-align: center;">Anda belum pernah membuat laporan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>