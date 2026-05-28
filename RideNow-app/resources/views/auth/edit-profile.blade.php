<h1>Edit Profile</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="/edit-profile" method="POST">
    @csrf

    <label>Username</label><br>
    <input type="text" name="name" value="{{ Auth::user()->name }}" required>
    <br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ Auth::user()->email }}" required>
    <br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="/home">Back to Home</a>