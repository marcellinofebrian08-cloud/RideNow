<!DOCTYPE html>
<html>
<head>
    <title>RideNow - Send Item</title>
</head>
<body>

    <h1>RideNow Send Homepage</h1>

    <h3>Saldo Wallet</h3>
    <p>Rp {{ number_format($wallet->balance, 0, ',', '.') }}</p>

    <p>
        <a href="/wallet">Top Up Wallet</a> |
        <a href="/address">Kelola Alamat Favorit</a>
    </p>

    <hr>

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <form method="POST" action="/send">
        @csrf

        <label>Nama Pengirim</label><br>
        <input type="text" name="sender_name" required>
        <br><br>

        <label>Nama Penerima</label><br>
        <input type="text" name="receiver_name" required>
        <br><br>

        <label>Nama Barang</label><br>
        <input type="text" name="item_name" required>
        <br><br>

        <label>Titik Awal Penjemputan</label><br>
        <select onchange="document.getElementById('pickup_location').value = this.value" style="margin-bottom: 5px; padding: 3px;">
            <option value="">-- Pilih dari Alamat Tersimpan (Opsional) --</option>
            @if(isset($addresses))
                @foreach($addresses as $address)
                    <option value="{{ $address->full_address }}">{{ $address->label }} ({{ $address->full_address }})</option>
                @endforeach
            @endif
        </select><br>
        <input type="text" id="pickup_location" name="pickup_location" placeholder="Ketik manual atau pilih dari alamat..." required style="width: 300px;">
        <br><br>

        <label>Titik Akhir / Destinasi</label><br>
        <select onchange="document.getElementById('destination').value = this.value" style="margin-bottom: 5px; padding: 3px;">
            <option value="">-- Pilih dari Alamat Tersimpan (Opsional) --</option>
            @if(isset($addresses))
                @foreach($addresses as $address)
                    <option value="{{ $address->full_address }}">{{ $address->label }} ({{ $address->full_address }})</option>
                @endforeach
            @endif
        </select><br>
        <input type="text" id="destination" name="destination" placeholder="Ketik manual atau pilih dari alamat..." required style="width: 300px;">
        <br><br>

        <label>Jarak / Distance (dalam KM) Rp4000/KM </label><br>
        <input type="number" name="distance" min="1" max="100" required>
        <br><br>

        <input type="submit" value="Pesan Sekarang">
    </form>

    <p><a href="/home">Kembali ke Dashboard</a></p>

</body>
</html>