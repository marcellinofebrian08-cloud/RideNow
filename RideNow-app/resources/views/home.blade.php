<!DOCTYPE html>
<html>

<head>
    <title>RideNow Home</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: red;
            color: white;
            padding: 20px;
        }

        .container {
            padding: 20px;
        }

        .box {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .menu-link {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: black;
        }

        .menu-link:hover {
            color: red;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .admin-table th,
        .admin-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .admin-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Welcome to RideNow</h1>
        <p>Login berhasil, Halo {{ Auth::user()->name }}!</p>
    </div>

    <div class="container">
        <div class="box">
            <h3>Account</h3>
            <a href="/edit-profile" class="menu-link">Edit Profile</a>
            <a href="/change-password" class="menu-link">Change Password</a>
            <a href="/logout" class="menu-link">Logout</a>
        </div>

        <div class="box">
            <h3>Main Menu</h3>
            <a href="/wallet" class="menu-link">Wallet</a>
            <a href="/ride" class="menu-link">Ride</a>
            <a href="/send" class="menu-link">Send</a>
            <a href="/food" class="menu-link">Food</a>
            <a href="/mart" class="menu-link">Mart</a>
            <a href="/history" class="menu-link">History</a>
            <a href="/dinein" class="menu-link">Dine In</a>
            <a href="/support" class="menu-link">Support</a>
            <a href="/transit" class="menu-link">Transit</a>
        </div>

        @if(Auth::user()->role == 'admin')

        <hr style="border: 1px solid #ccc; margin: 40px 0;">

        <div class="box" style="border: 2px solid red;">
            <h2 style="color: red; margin-top: 0;">Panel Admin RideNow</h2>

            <h3>Log Aktivitas Login User</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Terakhir Login Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if($user->last_login_at)
                            {{ \Carbon\Carbon::parse($user->last_login_at)->format('d-M-Y H:i:s') }}
                            @else
                            <span style="color: gray; font-style: italic;">Belum pernah login</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h3>Semua Histori Transaksi (Ride, Food, Topup)</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Waktu Transaksi</th>
                        <th>ID User</th>
                        <th>Tipe Transaksi</th>
                        <th>Deskripsi</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($histories) > 0)
                        @foreach($histories as $log)
                        <tr>
                            <td>{{ $log->created_at->format('d-M-Y H:i:s') }}</td>
                            <td>{{ $log->user_id }}</td>
                            <td>{{ $log->transaction_type }}</td>
                            <td>{{ $log->description }}</td>
                            <td>Rp {{ number_format($log->amount, 0, ',', '.') }}</td>
                            <td>
                                @if($log->status == 'Success')
                                    <strong style="color: green;">{{ $log->status }}</strong>
                                @else
                                    <strong style="color: orange;">{{ $log->status }}</strong>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center;">Belum ada transaksi di aplikasi.</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <hr style="border: 1px solid #ddd; margin: 30px 0;">
            <h3>Manajemen Pusat Bantuan</h3>
            <p>Kelola laporan kendala dari pengguna aplikasi.</p>
            <a href="{{ route('admin.support.index') }}" style="display: inline-block; background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                Buka Pusat Resolusi Keluhan
            </a>

        </div>
        @endif
    </div>
</body>

</html>