<!DOCTYPE html>
<html>
<head>
    <title>Alamat Favorit - RideNow</title>
    <style>
        body { font-family: Arial; background-color: #f5f5f5; margin: 0; padding: 0; }
        .header { background-color: #333; color: white; padding: 20px; }
        .container { padding: 20px; }
        .box { background-color: white; padding: 20px; margin-bottom: 20px; border-radius: 10px; }
        .btn-submit { background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        .btn-delete { background-color: red; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th, .table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Daftar Alamat Favorit</h1>
    </div>
    
    <div class="container">
        <a href="/home" style="display: inline-block; margin-bottom: 20px; color: black; text-decoration: none;">Kembali ke Home</a>

        <div class="box">
            <h3>Tambah Alamat Baru</h3>
            <form action="{{ route('address.store') }}" method="POST">
                @csrf
                <p>Nama Tempat (Contoh: Kosan, Kampus, Rumah):</p>
                <input type="text" name="label" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
                
                <p>Detail Alamat Lengkap:</p>
                <textarea name="full_address" rows="3" required style="width: 100%; padding: 8px; margin-bottom: 10px;"></textarea>
                
                <button type="submit" class="btn-submit">Simpan Alamat</button>
            </form>
        </div>

        <div class="box">
            <h3>Alamat Tersimpan</h3>
            <table class="table">
                <tr><th>Label</th><th>Alamat Lengkap</th><th>Aksi</th></tr>
                @forelse($addresses as $address)
                <tr>
                    <td><strong>{{ $address->label }}</strong></td>
                    <td>{{ $address->full_address }}</td>
                    <td>
                        <form action="{{ route('address.destroy', $address->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center;">Belum ada alamat yang disimpan.</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
</body>
</html>