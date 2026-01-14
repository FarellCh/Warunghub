<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - WarungHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto py-10 px-4">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold flex items-center gap-2">
            🛒 Keranjang Belanja
        </h1>
        <a href="/home" class="text-green-600 hover:underline">
            ← Lanjut Belanja
        </a>
    </div>

    @if(count($cart) == 0)
        <!-- EMPTY CART -->
        <div class="bg-white rounded-xl shadow p-16 text-center">
            <div class="text-7xl mb-4">🛒</div>
            <h2 class="text-2xl font-bold mb-2 text-gray-700">
                Keranjang kamu masih kosong
            </h2>
            <p class="text-gray-500 mb-6">
                Yuk mulai belanja kebutuhan warung kamu sekarang
            </p>
            <a href="/home"
               class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition">
                Mulai Belanja
            </a>
        </div>
    @else

        <!-- CART TABLE -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-gray-600 text-sm">
                        <th class="text-left px-6 py-4">Produk</th>
                        <th class="text-center px-6 py-4">Harga</th>
                        <th class="text-center px-6 py-4">Qty</th>
                        <th class="text-right px-6 py-4">Subtotal</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['qty'];
                            $total += $subtotal;
                        @endphp
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="font-semibold">{{ $item['name'] }}</div>
                            </td>

                            <td class="px-6 py-4 text-center">
                                Rp {{ number_format($item['price']) }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <div class="inline-flex items-center border rounded-lg">
                                    <form method="POST" action="/cart/update">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="hidden" name="type" value="minus">
                                        <button class="px-3 py-1 hover:bg-gray-200">−</button>
                                    </form>

                                    <span class="px-4 font-semibold">{{ $item['qty'] }}</span>

                                    <form method="POST" action="/cart/update">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="hidden" name="type" value="plus">
                                        <button class="px-3 py-1 hover:bg-gray-200">+</button>
                                    </form>
                                </div>
                            </td>

                            <td class="px-6 py-4 text-right font-bold text-green-600">
                                Rp {{ number_format($subtotal) }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                <form method="POST" action="/cart/remove">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button class="text-red-500 hover:underline text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- SUMMARY -->
        <div class="flex justify-end mt-8">
            <div class="bg-white shadow rounded-xl p-6 w-96">
                <div class="flex justify-between text-lg mb-4">
                    <span>Total Belanja</span>
                    <span class="font-bold text-green-600">
                        Rp {{ number_format($total) }}
                    </span>
                </div>

                <a href="/checkout"
                   class="block text-center bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition">
                    Lanjut ke Checkout
                </a>
            </div>
        </div>

    @endif

</div>

</body>
</html>
