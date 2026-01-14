<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Marketplace Pribadi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="flex flex-col md:flex-row-reverse w-full max-w-[1000px] min-h-[700px] bg-white shadow-2xl overflow-hidden md:rounded-2xl m-4">
        
        <div class="md:w-1/2 bg-slate-900 relative p-12 flex flex-col justify-between text-white overflow-hidden">
            <div class="absolute top-[-20%] right-[-10%] w-96 h-96 bg-blue-500/20 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="text-2xl font-bold tracking-widest text-blue-400 text-right md:text-left">KyoraDev.</div>
            </div>

            <div class="relative z-10">
                <h1 class="text-4xl font-bold leading-tight mb-4">Jadilah Bagian dari Komunitas Kami.</h1>
                <p class="text-slate-400 text-lg leading-relaxed">Dapatkan promo eksklusif, rilisan produk terbatas, dan pengalaman belanja yang lebih personal dengan membuat akun.</p>
            </div>

            
        </div>

        <div class="md:w-1/2 p-10 md:p-14 flex flex-col justify-center">
            <div class="mb-8 text-center md:text-left">
                <h2 class="text-3xl font-bold text-gray-800">Buat Akun</h2>
                <p class="text-gray-500 mt-2">Mulai petualangan belanjamu hari ini.</p>
            </div>

            <form class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan nama lengkap" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Email</label>
                    <input type="email" placeholder="nama@email.com" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Password</label>
                        <input type="password" placeholder="••••••••" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Konfirmasi</label>
                        <input type="password" placeholder="••••••••" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200">
                    </div>
                </div>

                

                <button class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all active:scale-[0.98] mt-2">
                    Daftar Sekarang
                </button>
            </form>

            <div class="mt-8 text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:underline">Masuk di sini</a>
            </div>
        </div>
    </div>

</body>
</html>