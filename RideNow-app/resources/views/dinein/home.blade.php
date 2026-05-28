<!DOCTYPE html>
<html>

<head>

    <title>Go Dine In</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        .header {
            padding: 25px;
            color: black;
            border-radius: 0 0 25px 25px;
        }

        .restaurant-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
        }

        .restaurant-image {
            width: 100%;
            height: 200px;
            border-radius: 15px;
        }
        .booking-btn {
            width: 100%;
            margin-top: 15px;
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Dine In</h2>
        <p>Pilih Restaurant Favorite Anda</p>
    </div>
    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>
        </div>
        @endif
        <h3 class="mb-4">
            List Restaurant
        </h3>
        @foreach($restaurants as $restaurant)
        <div class="restaurant-card">
            <div class="mt-3">
                <h4>
                    {{ $restaurant->name }}
                </h4>
                <p>
                    {{ $restaurant->address }}
                </p>
                <p>
                    rating restaurant {{ $restaurant->rating }}
                </p>
                <a href="/booking/{{ $restaurant->id }}" class="btn btn-danger booking-btn">
                    Booking Meja
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>