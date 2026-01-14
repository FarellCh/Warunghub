<!DOCTYPE html>
<html>
<head>
    <title>{{ $product['name'] }} - WarungHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto py-10 px-4">

    <a href="/home" class="text-green-600 hover:underline">← Kembali ke Home</a>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-8 rounded-xl shadow mt-6">

        <!-- Image -->
        <div>
            <img src="https://source.unsplash.com/600x600/?{{ $product['img'] }}"
                 class="rounded-lg w-full">
        </div>

        <!-- Info -->
        <div>
            <h1 class="text-3xl font-bold mb-4">{{ $product['name'] }}</h1>

            <p class="text-gray-600 mb-4">
                {{ $product['desc'] }}
            </p>

            <p class="text-2xl font-bold text-green-600 mb-2">
                Rp {{ number_format($product['price']) }}
            </p>

            <p class="text-sm text-gray-500 mb-6">
                Stok tersedia: {{ $product['stock'] }}
            </p>

            <button onclick="addToCart('{{ $product['name'] }}', {{ $product['price'] }})"
                class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
                Tambah ke Keranjang
            </button>

        </div>
    </div>

</div>

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
    }).then(() => {
        window.location = '/cart';
    });
}
</script>

</body>
</html>
