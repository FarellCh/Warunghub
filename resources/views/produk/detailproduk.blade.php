    <!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }} - MarketHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

@include('partials.navbar')

<div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-2 gap-10">

    <!-- Gambar -->
    <div>
        <img src="{{ $product->image }}" class="w-full rounded-lg shadow">
    </div>

    <!-- Info Produk -->
    <div class="bg-white p-6 rounded-lg shadow space-y-4">
        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>

        <p class="text-2xl text-orange-500 font-bold">
            Rp {{ number_format($product->price) }}
        </p>

        <p class="text-gray-600">
            {{ $product->description ?? 'Produk sembako berkualitas.' }}
        </p>

        <p class="text-sm">Stok: <span class="font-bold">{{ $product->stock }}</span></p>

        <!-- Qty -->
        <div class="flex items-center space-x-3">
            <button class="bg-gray-200 px-3 py-1">-</button>
            <input type="number" value="1" class="w-16 text-center border">
            <button class="bg-gray-200 px-3 py-1">+</button>
        </div>

        <!-- Action -->
        <div class="flex space-x-4 mt-4">
            <button class="flex-1 bg-orange-500 text-white py-3 rounded hover:bg-orange-600">
                🛒 Add to Cart
            </button>

            <button class="flex-1 bg-indigo-600 text-white py-3 rounded hover:bg-indigo-700">
                ⚡ Beli Sekarang
            </button>
        </div>
    </div>

</div>

</body>
</html>
