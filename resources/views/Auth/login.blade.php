<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-[1000px] bg-white shadow-2xl overflow-hidden md:rounded-2xl flex flex-col md:flex-row min-h-screen md:min-h-[600px]">

    <!-- LEFT (Hidden on mobile) -->
    <div class="hidden md:flex md:w-1/2 bg-indigo-600 relative p-12 flex-col justify-between text-white overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-64 h-64 bg-indigo-500 rounded-full opacity-50"></div>
        <div class="absolute bottom-[-5%] left-[-5%] w-40 h-40 bg-indigo-400 rounded-full opacity-30"></div>

        <div class="relative z-10">
            <div class="text-2xl font-bold tracking-tighter italic">KyoraDev</div>
        </div>

        <div class="relative z-10">
            <h1 class="text-4xl font-bold leading-tight mb-4">Sebelum Melanjutkan Aksi</h1>
            <p class="text-indigo-100 text-lg">Jangan lupa login dulu ya 👋</p>
        </div>

        <div class="relative z-10 text-sm opacity-70">
            &copy; 2026 KyoraDev
        </div>
    </div>

    <!-- RIGHT -->
    <div class="w-full md:w-1/2 p-6 md:p-16 flex flex-col justify-center">

        <!-- Mobile Logo -->
        <div class="md:hidden text-center mb-8">
            <div class="text-3xl font-bold text-indigo-600 italic">KyoraDev</div>
            <p class="text-gray-500 text-sm mt-1">Silakan login dulu</p>
        </div>

        <div class="mb-8 md:mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Selamat Datang</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Silakan login ke akun kamu.</p>
        </div>

        <!-- Errors -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded-lg text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required
                       placeholder="email@example.com"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                       placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition">
            </div>

            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-indigo-200 transition-all active:scale-[0.98]">
                Masuk Sekarang
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:underline">
                Daftar gratis
            </a>
        </div>

    </div>
</div>

</body>
</html>
