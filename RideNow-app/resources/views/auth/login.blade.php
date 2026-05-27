<!DOCTYPE html>
<html>
<head>
    <title>Masuk Akun RideNow</title>
</head>
<body>

    <h1>Masuk Akun RideNow</h1>

    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif

    <form method="POST" action="/login">
        @csrf

        <label>Email</label><br>
        <input type="email" name="email" required>
        <br><br>

        <label>Password</label><br>
        <input type="password" name="password" required>
        <br><br>

        <input type="submit" value="Login">
    </form>

    <p>Belum punya akun? <a href="/register">Register</a></p>

</body>
</html>