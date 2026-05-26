<!DOCTYPE html>
<html>
<head>
    <title>Wallet</title>
</head>
<body>

    <h1>Wallet Ride-Hailing App</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <h2>Saldo Kamu</h2>

    <p>
        Rp {{ number_format($wallet->balance, 0, ',', '.') }}
    </p>

    <hr>

    <h2>Top Up Saldo</h2>

    <form action="{{ route('wallet.topup') }}" method="POST">
        @csrf

        <label>Masukkan Nominal Top Up</label>
        <br>
        <input type="number" name="amount" placeholder="Contoh: 50000">

        @error('amount')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Top Up</button>
    </form>

    <p><a href="/home">Kembali ke Dashboard</a></p>
    
</body>
</html>