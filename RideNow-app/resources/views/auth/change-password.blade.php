<h1>Change Password</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form action="/change-password" method="POST">
    @csrf

    <label>Password Now</label><br>
    <input type="password" name="old_password" required>
    <br><br>

    <label>Password New</label><br>
    <input type="password" name="new_password" required>
    <br><br>

    <button type="submit">Change Password</button>
</form>

<br>
<a href="/home">Back to Home</a>