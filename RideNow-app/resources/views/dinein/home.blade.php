<!DOCTYPE html>
<html>

<head>

    <title>Dine In</title>
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
        <h3 class="mb-4">Kategori</h3>
        <div class="row mb-4">
            @foreach($categories as $category)
            <div class="col-3 mb-4">
                <a href="/dinein/category/{{$category->id}}" style="text-decoration: :none;color:black;">
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$category->icon) }}"width="70"height="70"style="object-fit:cover;border-radius:15px;">
                        <p class="mt-2">
                            {{$category->name}}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <h3 class="mb-4">
            List Restaurant
        </h3>
        @foreach($restaurants as $restaurant)
        <div class="restaurant-card">
            <img src="{{ asset('storage/'.$restaurant->image) }}"
                class="restaurant-image">
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
                <h3>Menu</h3>
                @foreach($restaurant->foods as $food)
                <div class="border rounded-3 p-2 mb-2">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/'.$food->image) }}"
                            width="70" height="70" style="object-fit:cover;border-radius:10px;">
                        <div class="ms-3">
                            <h6 class="mb-1">{{ $food->name }}</h6>
                            <p class="mb-0">Rp {{ number_format($food->price) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <h3 class="mb-4">Voucher Promo</h3>
            @foreach($vouchers as $voucher)
            <div class="alert alert-warning rounded-4 p-3 mb-3">
                <h5>{{ $voucher->title }}</h5>
                <p class="mb-0">Discount {{ $voucher->discount }}%</p>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>