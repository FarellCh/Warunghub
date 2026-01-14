<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WarungHub - Marketplace Sembako</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- HEADER -->
<div class="bg-green-600 text-white">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- LOGO -->
        <h1 class="text-2xl font-bold">WarungHub</h1>

        <!-- SEARCH -->
        <div class="flex w-1/2">
            <input type="text" placeholder="Cari beras, minyak, telur..."
                   class="w-full px-4 py-2 rounded-l-lg text-black">
            <button class="bg-orange-500 px-4 rounded-r-lg">🔍</button>
        </div>

        <!-- RIGHT NAV -->
        <div class="flex items-center space-x-6">

            <!-- CART -->
            <div class="relative cursor-pointer" onclick="window.location='/cart'">
                <span class="text-2xl">🛒</span>
                <span id="cartCount"
                    class="absolute -top-2 -right-3 bg-red-500 text-xs px-2 py-0.5 rounded-full">
                    {{ collect(session('cart'))->sum('qty') }}
                </span>
            </div>


            <a href="/login" class="hover:underline">Masuk</a>
            <a href="/register" class="bg-white text-green-600 px-4 py-2 rounded hover:bg-gray-100">
                Daftar
            </a>
        </div>

    </div>
</div>

<!-- BANNER -->
<div class="max-w-7xl mx-auto px-6 mt-6 grid grid-cols-3 gap-4">
    <div class="col-span-2 bg-green-500 text-white rounded-xl p-10">
        <h2 class="text-3xl font-bold">Paket Hemat Bulanan</h2>
        <p>Beras, minyak, gula, telur lebih murah!</p>
    </div>
    <div class="bg-yellow-400 text-black rounded-xl p-10">
        <h2 class="text-2xl font-bold">Gratis Ongkir</h2>
        <p>Khusus hari ini</p>
    </div>
</div>

<!-- CATEGORIES -->
<div class="max-w-7xl mx-auto px-6 mt-8">
    <h2 class="text-xl font-bold mb-4">Kategori Sembako</h2>
    <div class="grid grid-cols-6 gap-4 text-center">
        @foreach(['Beras','Minyak','Gula','Telur','Mie','Gas LPG'] as $cat)
        <div class="bg-white p-4 rounded shadow hover:bg-green-50 cursor-pointer">
            {{ $cat }}
        </div>
        @endforeach
    </div>
</div>

<!-- PRODUCTS -->
<div class="max-w-7xl mx-auto px-6 mt-10">
    <h2 class="text-xl font-bold mb-4">Produk Terlaris</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @php
        $products = [
            ['name'=>'Beras Ramos 5kg','price'=>75000,'img'=>'rice'],
            ['name'=>'Minyak Goreng 2L','price'=>38000,'img'=>'oil'],
            ['name'=>'Telur Ayam 1kg','price'=>29000,'img'=>'egg'],
            ['name'=>'Gula Pasir 1kg','price'=>15000,'img'=>'sugar'],
            ['name'=>'Mie Instan','price'=>3000,'img'=>'noodles'],
            ['name'=>'Gas LPG 3kg','price'=>21000,'img'=>'gas'],
            ['name'=>'Tepung Terigu','price'=>12000,'img'=>'flour'],
            ['name'=>'Susu Kaleng','price'=>13000,'img'=>'milk'],
        ];
        @endphp

        @foreach($products as $p)
        <div class="bg-white rounded-lg shadow hover:shadow-lg">
            <img src="https://source.unsplash.com/300x300/?{{ $p['img'] }}" class="rounded-t-lg">
            <div class="p-4">
                <h3 class="font-semibold">{{ $p['name'] }}</h3>
                <p class="text-green-600 font-bold">Rp {{ number_format($p['price']) }}</p>
                <button class="mt-2 w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
        @endforeach

    </div>
</div>

<!-- FOOTER -->
<div class="bg-white mt-16 py-6 text-center text-gray-500">
    © 2026 WarungHub — Marketplace Sembako Digital
</div>

</body>
</html>

<script>
function addToCart(name, price) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: name,
            name: name,
            price: price
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('cartCount').innerText = data.count;
    });
}
</script>
