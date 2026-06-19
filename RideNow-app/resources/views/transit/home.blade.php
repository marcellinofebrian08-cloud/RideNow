<!DOCTYPE html>
<html>

<head>
    <title>Transit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h2>Transit</h2>
        <p><a href="/home">Kembali ke Dashboard</a></p>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @foreach($transits as $transit)
        <div class="card p-3 mb-3">
            <img src="{{ asset('storage/'.$transit->image) }}"
                height="250"
                style="object-fit:cover;">
            <h4 class="mt-3">
                {{ $transit->name }}
            </h4>
            <p>
                {{ $transit->origin }}
                →
                {{ $transit->destination }}
            </p>
            <h5>
                Rp {{ number_format($transit->price) }}
            </h5>
            <a href="/transit/booking/{{ $transit->id }}"
                class="btn btn-primary">
                Pesan Tiket
            </a>
        </div>
        @endforeach
    </div>
</body>

</html>