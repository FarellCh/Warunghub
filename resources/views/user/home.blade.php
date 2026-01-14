<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WarungHub - Marketplace Sembako</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Swiper.js for carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <style>
        :root {
            --primary: #059669;
            --primary-dark: #047857;
            --secondary: #f97316;
            --accent: #fbbf24;
        }
        
        * {
            font-family: 'Poppins', 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        }
        
        .gradient-bg-secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #ea580c 100%);
        }
        
        .gradient-bg-accent {
            background: linear-gradient(135deg, var(--accent) 0%, #d97706 100%);
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .category-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            margin: 0 auto 12px;
            font-size: 24px;
        }
        
        .price-tag {
            background: linear-gradient(90deg, #10b981 0%, #059669 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
        
        .swiper-pagination-bullet {
            background-color: white !important;
            opacity: 0.7;
        }
        
        .swiper-pagination-bullet-active {
            background-color: var(--secondary) !important;
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- HEADER - Enhanced -->
<header class="gradient-bg text-white shadow-lg sticky top-0 z-50 animate__animated animate__fadeInDown">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        
        <!-- LOGO dengan ikon -->
        <a href="/home" class="flex items-center space-x-3 group">
            <div class="bg-white p-2 rounded-xl shadow-md group-hover:shadow-lg transition-all duration-300">
                <span class="text-primary text-2xl font-bold"><i class="fas fa-store"></i></span>
            </div>
            <div>
                <h1 class="text-2xl font-bold tracking-tight">WarungHub</h1>
                <p class="text-xs text-green-100 opacity-80">Marketplace Sembako Digital</p>
            </div>
        </a>

        <!-- SEARCH - Enhanced -->
        <div class="flex-1 max-w-2xl mx-6">
            <div class="relative">
                <input type="text" 
                       placeholder="Cari beras, minyak, telur, gula, mie..." 
                       class="w-full px-5 py-3 pl-12 rounded-xl text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
                <button class="absolute right-0 top-0 h-full bg-secondary text-white px-5 rounded-r-xl hover:bg-orange-600 transition-all duration-300 shadow-md">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
            </div>
        </div>

        <!-- RIGHT NAV - Enhanced -->
        <div class="flex items-center space-x-6">
            <!-- User Menu -->
            <div class="hidden md:flex items-center space-x-2 text-sm">
                <div class="p-2 bg-white/10 rounded-full">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <p class="font-medium">Halo, Pelanggan</p>
                    <a href="/login" class="text-green-100 hover:text-white hover:underline text-xs">Masuk / Daftar</a>
                </div>
            </div>
            
            <!-- Cart with badge -->
            <a href="/cart" class="relative group">
                <div class="p-3 bg-white/10 rounded-xl group-hover:bg-white/20 transition-all duration-300 relative">
                    <i class="fas fa-shopping-cart text-xl"></i>
                    <span id="cartCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-md">
                        {{ collect(session('cart'))->sum('qty') }}
                    </span>
                </div>
            </a>
            
            <!-- Mobile menu button -->
            <button class="md:hidden p-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all duration-300">
                <i class="fas fa-bars"></i>
            </button>
        </div>

    </div>
</header>

<!-- BANNER SECTION - Enhanced with Swiper -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
    <div class="swiper bannerSwiper rounded-2xl overflow-hidden shadow-xl">
        <div class="swiper-wrapper">
            <!-- Banner 1 -->
            <div class="swiper-slide">
                <div class="gradient-bg text-white p-8 md:p-12 rounded-2xl flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 animate__animated animate__fadeInLeft">
                        <span class="bg-white/20 px-4 py-1 rounded-full text-sm font-medium mb-4 inline-block">Promo Spesial</span>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Paket Hemat Bulanan</h2>
                        <p class="text-lg mb-6 opacity-90">Beras, minyak, gula, telur - semua lebih murah dengan paket khusus!</p>
                        <div class="flex items-center space-x-2 mb-6">
                            <span class="text-2xl font-bold">Hemat hingga 25%</span>
                            <span class="bg-white text-primary px-3 py-1 rounded-full text-sm font-bold">TERBATAS</span>
                        </div>
                        <button class="bg-white text-primary font-bold px-6 py-3 rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-shopping-basket mr-2"></i>Beli Sekarang
                        </button>
                    </div>
                    <div class="md:w-2/5 mt-6 md:mt-0 animate__animated animate__fadeInRight">
                        <img src="https://images.unsplash.com/photo-1586201375761-83865001e31c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Paket Hemat" class="rounded-xl shadow-2xl">
                    </div>
                </div>
            </div>
            
            <!-- Banner 2 -->
            <div class="swiper-slide">
                <div class="gradient-bg-secondary text-white p-8 md:p-12 rounded-2xl flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2">
                        <span class="bg-white/20 px-4 py-1 rounded-full text-sm font-medium mb-4 inline-block">Hari Ini Saja</span>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Gratis Ongkir 🚚</h2>
                        <p class="text-lg mb-6 opacity-90">Minimal pembelian Rp 50.000 dapatkan gratis ongkir ke seluruh wilayah!</p>
                        <div class="flex items-center space-x-2 mb-6">
                            <span class="text-2xl font-bold">Kode: <span class="bg-white text-orange-600 px-3 py-1 rounded-lg">GRATISONGKIR</span></span>
                        </div>
                        <button class="bg-white text-orange-600 font-bold px-6 py-3 rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-truck mr-2"></i>Klaim Sekarang
                        </button>
                    </div>
                    <div class="md:w-2/5 mt-6 md:mt-0">
                        <img src="https://images.unsplash.com/photo-1562887189-e5d078343de4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Gratis Ongkir" class="rounded-xl shadow-2xl">
                    </div>
                </div>
            </div>
            
            <!-- Banner 3 -->
            <div class="swiper-slide">
                <div class="gradient-bg-accent text-gray-900 p-8 md:p-12 rounded-2xl flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2">
                        <span class="bg-black/10 px-4 py-1 rounded-full text-sm font-medium mb-4 inline-block">New Product</span>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Produk Organik 🌿</h2>
                        <p class="text-lg mb-6 opacity-90">Kini tersedia beras organik, telur ayam kampung, dan bahan sehat lainnya!</p>
                        <div class="flex items-center space-x-2 mb-6">
                            <span class="text-2xl font-bold">100% Alami</span>
                            <span class="bg-black/10 px-3 py-1 rounded-full text-sm font-bold">PREMIUM</span>
                        </div>
                        <button class="bg-gray-900 text-yellow-300 font-bold px-6 py-3 rounded-xl hover:bg-black transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-leaf mr-2"></i>Lihat Produk
                        </button>
                    </div>
                    <div class="md:w-2/5 mt-6 md:mt-0">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Produk Organik" class="rounded-xl shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- CATEGORIES SECTION - Enhanced -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Kategori Sembako</h2>
        <a href="#" class="text-primary hover:text-primary-dark font-medium transition-colors duration-300">
            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
        @php
        $categories = [
            ['name' => 'Beras', 'icon' => 'fas fa-wheat-awn', 'color' => 'bg-green-100 text-green-600'],
            ['name' => 'Minyak', 'icon' => 'fas fa-oil-can', 'color' => 'bg-yellow-100 text-yellow-600'],
            ['name' => 'Gula', 'icon' => 'fas fa-cubes', 'color' => 'bg-pink-100 text-pink-600'],
            ['name' => 'Telur', 'icon' => 'fas fa-egg', 'color' => 'bg-amber-100 text-amber-600'],
            ['name' => 'Mie', 'icon' => 'fas fa-utensils', 'color' => 'bg-blue-100 text-blue-600'],
            ['name' => 'Gas LPG', 'icon' => 'fas fa-fire', 'color' => 'bg-red-100 text-red-600'],
            ['name' => 'Susu', 'icon' => 'fas fa-wine-bottle', 'color' => 'bg-indigo-100 text-indigo-600'],
            ['name' => 'Snack', 'icon' => 'fas fa-cookie-bite', 'color' => 'bg-purple-100 text-purple-600'],
            ['name' => 'Bumbu', 'icon' => 'fas fa-mortar-pestle', 'color' => 'bg-orange-100 text-orange-600'],
            ['name' => 'Sayuran', 'icon' => 'fas fa-carrot', 'color' => 'bg-emerald-100 text-emerald-600'],
            ['name' => 'Buah', 'icon' => 'fas fa-apple-alt', 'color' => 'bg-rose-100 text-rose-600'],
            ['name' => 'Daging', 'icon' => 'fas fa-drumstick-bite', 'color' => 'bg-red-100 text-red-600'],
        ];
        @endphp
        
        @foreach($categories as $cat)
        <div class="bg-white card-hover rounded-xl p-5 text-center shadow-sm border border-gray-100 cursor-pointer transition-all duration-300 hover:border-primary/20 animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 0.05 }}s">
            <div class="{{ $cat['color'] }} category-icon">
                <i class="{{ $cat['icon'] }}"></i>
            </div>
            <h3 class="font-semibold text-gray-800">{{ $cat['name'] }}</h3>
            <p class="text-xs text-gray-500 mt-1">Lihat produk</p>
        </div>
        @endforeach
    </div>
</div>

<!-- PRODUCTS SECTION - Enhanced -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-16">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Produk Terlaris</h2>
            <p class="text-gray-600 mt-1">Produk dengan penjualan tertinggi bulan ini</p>
        </div>
        <div class="flex space-x-2">
            <button class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-300">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors duration-300">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    @php
    $products = [
        ['name'=>'Beras Ramos 5kg','price'=>75000,'img'=>'rice', 'rating'=>4.8, 'sold'=>1240, 'discount'=>15],
        ['name'=>'Minyak Goreng 2L','price'=>38000,'img'=>'oil', 'rating'=>4.6, 'sold'=>980, 'discount'=>10],
        ['name'=>'Telur Ayam 1kg','price'=>29000,'img'=>'egg', 'rating'=>4.7, 'sold'=>1560],
        ['name'=>'Gula Pasir 1kg','price'=>15000,'img'=>'sugar', 'rating'=>4.5, 'sold'=>2100],
        ['name'=>'Mie Instan','price'=>3000,'img'=>'noodles', 'rating'=>4.4, 'sold'=>3200, 'discount'=>5],
        ['name'=>'Gas LPG 3kg','price'=>21000,'img'=>'gas', 'rating'=>4.9, 'sold'=>740],
        ['name'=>'Tepung Terigu','price'=>12000,'img'=>'flour', 'rating'=>4.3, 'sold'=>1100],
        ['name'=>'Susu Kaleng','price'=>13000,'img'=>'milk', 'rating'=>4.6, 'sold'=>890, 'discount'=>12],
    ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $p)
        <div class="bg-white card-hover rounded-2xl overflow-hidden shadow-sm border border-gray-100 transition-all duration-300 animate__animated animate__fadeInUp" style="animation-delay: {{ $loop->index * 0.05 }}s">
            
            <!-- Product Image dengan badge diskon -->
            <div class="relative">
                <a href="/product/{{ urlencode($p['name']) }}">
                    <img src="https://source.unsplash.com/400x400/?{{ $p['img'] }},grocery"
                         class="w-full h-56 object-cover hover:scale-105 transition-transform duration-500"
                         alt="{{ $p['name'] }}">
                </a>
                
                @if(isset($p['discount']))
                <div class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                    -{{ $p['discount'] }}%
                </div>
                @endif
                
                <button class="absolute top-3 right-3 bg-white/90 hover:bg-white text-gray-800 p-2 rounded-full shadow-md transition-all duration-300">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
            
            <!-- Product Info -->
            <div class="p-5">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-medium bg-green-100 text-green-800 px-2 py-1 rounded">
                        <i class="fas fa-star text-yellow-500 mr-1"></i>{{ $p['rating'] }}
                    </span>
                    <span class="text-xs text-gray-500">
                        Terjual {{ number_format($p['sold']) }}
                    </span>
                </div>
                
                <a href="/product/{{ urlencode($p['name']) }}">
                    <h3 class="font-semibold text-gray-800 hover:text-primary transition-colors duration-300 line-clamp-2">
                        {{ $p['name'] }}
                    </h3>
                </a>
                
                <!-- Price -->
                <div class="mt-3">
                    @if(isset($p['discount']))
                    <div class="flex items-center space-x-2">
                        <span class="text-xl font-bold text-gray-900">Rp {{ number_format($p['price'] * (100 - $p['discount']) / 100) }}</span>
                        <span class="text-sm text-gray-500 line-through">Rp {{ number_format($p['price']) }}</span>
                    </div>
                    @else
                    <span class="text-xl font-bold text-gray-900">Rp {{ number_format($p['price']) }}</span>
                    @endif
                </div>
                
                <!-- Action Button -->
                <button onclick="addToCart('{{ $p['name'] }}', {{ $p['price'] }})"
                    class="mt-4 w-full gradient-bg hover:opacity-90 text-white font-medium py-3 rounded-xl transition-all duration-300 flex items-center justify-center group">
                    <i class="fas fa-cart-plus mr-2 group-hover:scale-110 transition-transform duration-300"></i>
                    Tambah ke Keranjang
                </button>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Load More Button -->
    <div class="text-center mt-10">
        <button class="px-8 py-3 border-2 border-primary text-primary font-semibold rounded-xl hover:bg-primary hover:text-white transition-all duration-300">
            <i class="fas fa-sync-alt mr-2"></i>Muat Lebih Banyak
        </button>
    </div>
</div>

<!-- FEATURES SECTION -->
<div class="bg-gradient-to-br from-gray-50 to-white py-12 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="bg-primary/10 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-shipping-fast text-2xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Gratis Ongkir</h3>
                <p class="text-gray-600">Minimal pembelian Rp 50.000 untuk wilayah tertentu</p>
            </div>
            
            <div class="text-center p-6">
                <div class="bg-primary/10 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-shield-alt text-2xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Garansi Produk</h3>
                <p class="text-gray-600">Garansi uang kembali jika produk tidak sesuai</p>
            </div>
            
            <div class="text-center p-6">
                <div class="bg-primary/10 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <i class="fas fa-headset text-2xl text-primary"></i>
                </div>
                <h3 class="font-bold text-lg mb-2">Bantuan 24/7</h3>
                <p class="text-gray-600">Customer service siap membantu kapan saja</p>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER - Enhanced -->
<footer class="bg-gray-900 text-white pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
            <div>
                <div class="flex items-center space-x-3 mb-6">
                    <div class="bg-white p-2 rounded-lg">
                        <span class="text-primary text-xl font-bold">🏪</span>
                    </div>
                    <h2 class="text-2xl font-bold">WarungHub</h2>
                </div>
                <p class="text-gray-400 mb-6">Marketplace sembako digital terpercaya dengan harga terjangkau dan kualitas terbaik.</p>
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-800 hover:bg-gray-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="bg-gray-800 hover:bg-gray-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="bg-gray-800 hover:bg-gray-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="bg-gray-800 hover:bg-gray-700 p-2 rounded-lg transition-colors duration-300">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-6">Kategori</h3>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Beras & Beras Organik</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Minyak Goreng</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Gula & Pemanis</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Telur & Produk Hewani</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Mie & Pasta</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-6">Layanan</h3>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Cara Berbelanja</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Pembayaran</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Pengiriman</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-300">Kebijakan Privasi</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-6">Kontak Kami</h3>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-3 text-primary"></i>
                        <span>Jl. Sembako No. 123, Jakarta</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 text-primary"></i>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-primary"></i>
                        <span>hello@warunghub.id</span>
                    </li>
                </ul>
                
                <div class="mt-8">
                    <h4 class="font-bold mb-4">Download Aplikasi</h4>
                    <div class="flex space-x-3">
                        <a href="#" class="bg-gray-800 hover:bg-gray-700 px-4 py-3 rounded-lg flex items-center transition-colors duration-300">
                            <i class="fab fa-google-play mr-2"></i>
                            <div class="text-xs">
                                <div>GET IT ON</div>
                                <div class="font-bold">Google Play</div>
                            </div>
                        </a>
                        <a href="#" class="bg-gray-800 hover:bg-gray-700 px-4 py-3 rounded-lg flex items-center transition-colors duration-300">
                            <i class="fab fa-app-store mr-2"></i>
                            <div class="text-xs">
                                <div>Download on the</div>
                                <div class="font-bold">App Store</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pt-8 border-t border-gray-800 text-center text-gray-500 text-sm">
            <p>© 2026 WarungHub — Marketplace Sembako Digital. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop" class="fixed bottom-8 right-8 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-primary-dark transition-all duration-300 opacity-0 translate-y-10">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- Notification Toast -->
<div id="toast" class="fixed bottom-8 left-8 bg-gray-900 text-white p-4 rounded-xl shadow-2xl max-w-sm transform -translate-x-full transition-transform duration-500">
    <div class="flex items-center">
        <div class="bg-green-500 p-2 rounded-lg mr-3">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <p class="font-semibold">Berhasil ditambahkan!</p>
            <p class="text-sm text-gray-300">Produk telah masuk ke keranjang belanja</p>
        </div>
    </div>
</div>

<script>
// Initialize Swiper
const swiper = new Swiper('.bannerSwiper', {
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
});

// Back to Top Button
const backToTop = document.getElementById('backToTop');
const toast = document.getElementById('toast');

window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        backToTop.classList.remove('opacity-0', 'translate-y-10');
        backToTop.classList.add('opacity-100', 'translate-y-0');
    } else {
        backToTop.classList.remove('opacity-100', 'translate-y-0');
        backToTop.classList.add('opacity-0', 'translate-y-10');
    }
});

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Enhanced addToCart function with toast notification
function addToCart(name, price) {
    // Show toast notification
    toast.classList.remove('-translate-x-full');
    toast.classList.add('translate-x-0');
    
    // Simulate API call
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
        // Update cart count
        document.getElementById('cartCount').innerText = data.count;
        
        // Hide toast after 3 seconds
        setTimeout(() => {
            toast.classList.remove('translate-x-0');
            toast.classList.add('-translate-x-full');
        }, 3000);
    })
    .catch(error => {
        console.error('Error:', error);
        // Hide toast on error
        setTimeout(() => {
            toast.classList.remove('translate-x-0');
            toast.classList.add('-translate-x-full');
        }, 3000);
    });
}

// Add hover effect to cards
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('animate__pulse');
        });
        
        card.addEventListener('mouseleave', function() {
            this.classList.remove('animate__pulse');
        });
    });
});
</script>

</body>
</html>