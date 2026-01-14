<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin WarungHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-green-700 text-white">
        <div class="p-5 text-2xl font-bold border-b border-green-600">
            WarungHub Admin
        </div>

        <nav class="mt-5 space-y-2">
            <a href="/admin/dashboard" class="block px-5 py-3 hover:bg-green-600">📊 Dashboard</a>
            <a href="/admin/products" class="block px-5 py-3 hover:bg-green-600">📦 Produk</a>
            <a href="/admin/categories" class="block px-5 py-3 hover:bg-green-600">📂 Kategori</a>
            <a href="/" class="block px-5 py-3 hover:bg-green-600">🌐 Ke Website</a>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
