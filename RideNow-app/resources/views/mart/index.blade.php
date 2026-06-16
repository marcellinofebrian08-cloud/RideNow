<h1>Layanan Pesan Antar Mart</h1>

@if(session('success'))
    <p style="color: green;">
        <b>{{ session('success') }}</b>
    </p>
@endif

@if(session('error'))
    <p style="color: red;">
        <b>{{ session('error') }}</b>
    </p>
@endif

<h3>Pilih Kategori Produk:</h3>

@if($categories->isEmpty())
    <p>Belum ada kategori yang tersedia.</p>
@else

    @php
        $categoryConfig = [
            'makanan'                    => 'food.png',
            'minuman'                    => 'drink.png',
            'bahan dapur'                => 'kitchen.png',
            'obat-obatan'                => 'medicine.png',
            'alat kecantikan'            => 'beauty.png',
            'kebutuhan rumah tangga'     => 'house.png',
        ];
    @endphp

    <div style="display: flex; flex-wrap: wrap; gap: 16px; margin-top: 10px;">

        @foreach($categories as $category)

            @php
                $key = strtolower(trim($category->category_name ?? ''));
                $imageName = $categoryConfig[$key] ?? null;
            @endphp

            <a href="{{ route('mart.showCategory', $category->id) }}"
               style="text-decoration: none;">

                <div style="
                    background-color: #00ced1;
                    border-radius: 12px;
                    width: 130px;
                    height: 120px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    padding: 8px;
                    box-sizing: border-box;
                "
                onmouseover="this.style.backgroundColor='#00acc1'"
                onmouseout="this.style.backgroundColor='#00ced1'">

                    @if($imageName)

                        <img src="{{ asset('images/category_img/' . $imageName) }}"
                             alt="{{ $category->category_name }}"
                             style="
                                width: 80px;
                                height: 70px;
                                object-fit: contain;
                                margin-bottom: 6px;
                             ">

                    @else

                        <div style="font-size: 30px; margin-bottom: 6px;">🛒</div>

                    @endif

                    <div style="
                        font-size: 12px;
                        font-weight: bold;
                        color: white;
                        text-align: center;
                        line-height: 1.3;
                    ">
                        {{ $category->category_name }}
                    </div>

                </div>

            </a>
        @endforeach
    </div>
@endif

<br>

<p>
    <a href="{{ route('mart.history') }}"
       style="text-decoration: none;">
        <button type="button"
                style="background-color: plum; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer; margin-right: 10px;">
            Lihat Riwayat Belanja
        </button>
    </a>

    <a href="/home"
       style="text-decoration: none;">
        <button type="button"
                style="background-color: plum; border: 1px solid lightgray; padding: 6px 12px; cursor: pointer;">
            Kembali ke Dashboard
        </button>
    </a>
</p>