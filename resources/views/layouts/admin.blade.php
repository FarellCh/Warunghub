<div class="flex min-h-screen">

<!-- Sidebar -->
<div class="w-64 bg-green-700 text-white p-5 space-y-4">
    <h1 class="text-2xl font-bold mb-6">Admin WarungHub</h1>

    <a href="/admin/dashboard" class="block hover:bg-green-600 p-2 rounded">📊 Dashboard</a>
    <a href="/admin/products" class="block hover:bg-green-600 p-2 rounded">📦 Produk</a>
    <a href="/admin/orders" class="block hover:bg-green-600 p-2 rounded">🛒 Pemesanan</a>
    <a href="/admin/users" class="block hover:bg-green-600 p-2 rounded">👤 Pengguna</a>
    <a href="/admin/logs" class="block hover:bg-green-600 p-2 rounded">📜 Log Aktivitas</a>
</div>

<!-- Content -->
<div class="flex-1 p-8 bg-gray-100">
    @yield('content')
</div>

</div>
