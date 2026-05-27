<h1>Buat Akun RideNow</h1>

<form action="/register" method="POST">
    @csrf

    <label>Nama</label><br>
    <input type="text" name="name" required>
    <br><br>

    <label>Email</label><br>
    <input type="email" name="email" required>
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">Buat Akun</button>
</form>