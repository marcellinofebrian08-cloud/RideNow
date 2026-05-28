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
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome to RideNow</h1>
        <p>Login berhasil</p>
    </div>
    <div class="container">
        <div class="box">
            <h3>Account</h3>
            <a href="/edit-profile" class="menu-link">
                Edit Profile
            </a>
            <a href="/change-password" class="menu-link">
                Change Password
            </a>
            <a href="/logout" class="menu-link">
                Logout
            </a>
        </div>
        <div class="box">
            <h3>Main Menu</h3>
            <a href="/wallet" class="menu-link">
                Wallet
            </a>
            <a href="/ride" class="menu-link">
                Ride
            </a>
            <a href="/send" class="menu-link">
                Send
            </a>
            <a href="/food" class="menu-link">
                Food
            </a>
            <a href="/mart" class="menu-link">
                Mart
            </a>
            <a href="/history" class="menu-link">
                History
            </a>
            <a href="/dinein" class="menu-link">
                Dine In
            </a>
        </div>
    </div>
</body>
</html>