<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product['name'] }} - WarungHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }
        
        .price-badge {
            background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        }
        
        .zoom-image {
            transition: transform 0.3s ease;
            cursor: zoom-in;
        }
        
        .zoom-image:hover {
            transform: scale(1.05);
        }
        
        .quantity-btn {
            transition: all 0.2s ease;
        }
        
        .quantity-btn:hover {
            background-color: #059669;
            color: white;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #059669;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #047857;
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- Header Navigation -->
<nav class="gradient-bg text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="/home" class="flex items-center space-x-2 group">
            <div class="bg-white p-2 rounded-lg">
                <span class="text-green-600 text-xl font-bold">🏪</span>
            </div>
            <span class="text-xl font-bold">WarungHub</span>
        </a>
        
        <div class="flex items-center space-x-6">
            <a href="/home" class="hover:text-green-100 transition-colors duration-300">
                <i class="fas fa-home mr-2"></i>Beranda
            </a>
            <a href="/cart" class="relative group">
                <div class="p-2 bg-white/10 rounded-lg group-hover:bg-white/20 transition-all duration-300">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </a>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-4 py-8">

    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/home" class="inline-flex items-center text-sm text-gray-700 hover:text-green-600 transition-colors duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="#" class="text-sm text-gray-700 hover:text-green-600 transition-colors duration-300">
                            {{ ucfirst($product['category'] ?? 'Sembako') }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-green-600">{{ $product['name'] }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Product Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Left Column - Images -->
        <div class="space-y-4">
            <!-- Main Image -->
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                <div class="relative overflow-hidden rounded-xl">
                    <img src="https://source.unsplash.com/800x800/?{{ $product['img'] }},product"
                         class="w-full h-auto rounded-xl zoom-image"
                         id="mainImage"
                         alt="{{ $product['name'] }}">
                    
                    <!-- Badge if on sale -->
                    @if(isset($product['discount']) && $product['discount'] > 0)
                    <div class="absolute top-4 left-4">
                        <span class="bg-red-500 text-white font-bold px-4 py-2 rounded-full shadow-lg text-sm">
                            -{{ $product['discount'] }}% OFF
                        </span>
                    </div>
                    @endif
                    
                    <!-- Favorite Button -->
                    <button class="absolute top-4 right-4 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg transition-all duration-300">
                        <i class="fas fa-heart text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Thumbnail Images -->
            <div class="bg-white rounded-2xl shadow p-6 border border-gray-100">
                <h3 class="font-semibold text-gray-800 mb-4">Gambar Lainnya</h3>
                <div class="grid grid-cols-4 gap-3">
                    @php
                    $thumbnails = [
                      
                    ];
                    @endphp
                    
                    @foreach($thumbnails as $thumb)
                    <img src="{{ $thumb }}" 
                         class="w-full h-24 object-cover rounded-lg cursor-pointer border-2 border-transparent hover:border-green-500 transition-all duration-300"
                         onclick="changeMainImage(this.src)"
                         alt="Product Image {{ $loop->index + 1 }}">
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Column - Product Info -->
        <div class="space-y-6">
            <!-- Product Header -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <!-- Rating Badge -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center bg-green-100 text-green-800 px-3 py-1 rounded-full">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>
                            <span class="font-bold">{{ $product['rating'] ?? 4.5 }}</span>
                        </div>
                        <span class="text-gray-500 text-sm">|</span>
                        <span class="text-gray-600 text-sm">
                            <i class="fas fa-shopping-bag mr-1"></i>
                            {{ number_format($product['sold'] ?? 1200) }} terjual
                        </span>
                        <span class="text-gray-500 text-sm">|</span>
                        <span class="text-gray-600 text-sm">
                            <i class="fas fa-eye mr-1"></i>
                            {{ number_format($product['views'] ?? 2500) }} dilihat
                        </span>
                    </div>
                    
                    <!-- Share Button -->
                    <button class="text-gray-500 hover:text-green-600 transition-colors duration-300">
                        <i class="fas fa-share-alt text-xl"></i>
                    </button>
                </div>
                
                <!-- Product Name -->
                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $product['name'] }}</h1>
                
                <!-- Category Tags -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-tag mr-1"></i>{{ $product['category'] ?? 'Sembako' }}
                    </span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-leaf mr-1"></i>Original
                    </span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                        <i class="fas fa-certificate mr-1"></i>Halal
                    </span>
                </div>
                
                <!-- Price Section -->
                <div class="mb-6">
                    @if(isset($product['discount']) && $product['discount'] > 0)
                    <div class="flex items-center space-x-4">
                        <div>
                            <span class="text-4xl font-bold text-gray-900">
                                Rp {{ number_format($product['price'] * (100 - $product['discount']) / 100) }}
                            </span>
                            <span class="text-lg text-gray-500 line-through ml-2">
                                Rp {{ number_format($product['price']) }}
                            </span>
                        </div>
                        <div class="price-badge text-white font-bold px-4 py-2 rounded-lg">
                            Hemat {{ $product['discount'] }}%
                        </div>
                    </div>
                    @else
                    <span class="text-4xl font-bold text-gray-900">
                        Rp {{ number_format($product['price']) }}
                    </span>
                    @endif
                    
                    <p class="text-sm text-gray-500 mt-2">
                        <i class="fas fa-info-circle mr-1"></i>
                        Harga sudah termasuk PPN
                    </p>
                </div>
                
                <!-- Stock & Status -->
                <div class="mb-8">
                    @if(($product['stock'] ?? 0) > 50)
                    <div class="flex items-center text-green-600">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                        <span class="font-semibold">Stok Tersedia</span>
                        <span class="ml-2 text-gray-600">({{ $product['stock'] }} unit)</span>
                    </div>
                    @elseif(($product['stock'] ?? 0) > 0)
                    <div class="flex items-center text-yellow-600">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                        <span class="font-semibold">Stok Terbatas</span>
                        <span class="ml-2 text-gray-600">({{ $product['stock'] }} unit tersisa)</span>
                    </div>
                    @else
                    <div class="flex items-center text-red-600">
                        <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                        <span class="font-semibold">Stok Habis</span>
                    </div>
                    @endif
                    
                    <div class="mt-2 text-sm text-gray-600">
                        <i class="fas fa-truck mr-1"></i>
                        Pengiriman dari <span class="font-semibold">Jakarta</span> • 
                        <span class="text-green-600 font-semibold">Gratis Ongkir</span> untuk order > Rp 50.000
                    </div>
                </div>
                
                <!-- Quantity Selector -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-3">Jumlah:</label>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center border border-gray-300 rounded-xl overflow-hidden">
                            <button onclick="updateQuantity(-1)" 
                                    class="quantity-btn bg-gray-100 text-gray-700 w-12 h-12 flex items-center justify-center text-xl">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" 
                                   id="quantity" 
                                   value="1" 
                                   min="1" 
                                   max="{{ $product['stock'] ?? 100 }}"
                                   class="w-16 text-center text-lg font-semibold border-0 focus:ring-0 focus:outline-none">
                            <button onclick="updateQuantity(1)" 
                                    class="quantity-btn bg-gray-100 text-gray-700 w-12 h-12 flex items-center justify-center text-xl">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <span class="text-gray-600">
                            Maksimal {{ $product['stock'] ?? 100 }} per pembelian
                        </span>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button onclick="addToCartWithQuantity()"
                            class="gradient-bg hover:opacity-90 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center text-lg shadow-lg hover:shadow-xl">
                        <i class="fas fa-cart-plus mr-3 text-xl"></i>
                        Tambah ke Keranjang
                    </button>
                    
                    <button onclick="buyNow()"
                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center text-lg shadow-lg hover:shadow-xl">
                        <i class="fas fa-bolt mr-3 text-xl"></i>
                        Beli Sekarang
                    </button>
                </div>
            </div>

            <!-- Product Details Card -->
            <div class="bg-white rounded-2xl shadow p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-3 text-green-600"></i>
                    Detail Produk
                </h2>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600 mb-1">Kategori</p>
                            <p class="font-semibold">{{ $product['category'] ?? 'Sembako' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600 mb-1">Merek</p>
                            <p class="font-semibold">{{ explode(' ', $product['name'])[0] ?? 'WarungHub' }}</p>
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 mb-2">Deskripsi Produk</p>
                        <p class="text-gray-800 leading-relaxed">
                            {{ $product['desc'] ?? 'Produk berkualitas tinggi dengan bahan pilihan terbaik. Cocok untuk kebutuhan sehari-hari keluarga Indonesia.' }}
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-gray-600 mb-2">Keunggulan</p>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Kualitas premium dengan harga terjangkau</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Produk segar dengan masa simpan yang baik</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Terjamin kehalalannya</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-3"></i>
                                <span>Packaging aman dan higienis</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Specifications Card -->
            <div class="bg-white rounded-2xl shadow p-8 border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-clipboard-list mr-3 text-green-600"></i>
                    Spesifikasi
                </h2>
                
                <div class="space-y-3">
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="text-gray-600">Berat</span>
                        <span class="font-semibold">
                            @if(strpos(strtolower($product['name']), '5kg') !== false)
                                5 kg
                            @elseif(strpos(strtolower($product['name']), '2l') !== false)
                                2 Liter
                            @elseif(strpos(strtolower($product['name']), '1kg') !== false)
                                1 kg
                            @elseif(strpos(strtolower($product['name']), '3kg') !== false)
                                3 kg
                            @else
                                1 kg
                            @endif
                        </span>
                    </div>
                    
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="text-gray-600">Masa Kadaluarsa</span>
                        <span class="font-semibold">6-12 Bulan</span>
                    </div>
                    
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="text-gray-600">Kondisi</span>
                        <span class="font-semibold text-green-600">Baru</span>
                    </div>
                    
                    <div class="flex justify-between py-3 border-b border-gray-100">
                        <span class="text-gray-600">Garansi</span>
                        <span class="font-semibold">Uang Kembali 100%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <div class="mt-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Produk Serupa</h2>
            <a href="/home" class="text-green-600 hover:text-green-700 font-semibold transition-colors duration-300">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @php
            $relatedProducts = [
                ['name'=>'Beras Premium 5kg','price'=>85000,'img'=>'rice','rating'=>4.9],
                ['name'=>'Minyak Goreng 1L','price'=>22000,'img'=>'oil','rating'=>4.7],
                ['name'=>'Telur Omega 3','price'=>35000,'img'=>'egg','rating'=>4.8],
                ['name'=>'Gula Merah 1kg','price'=>18000,'img'=>'sugar','rating'=>4.6],
            ];
            @endphp
            
            @foreach($relatedProducts as $rp)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                <a href="/product/{{ urlencode($rp['name']) }}">
                    <img src="https://source.unsplash.com/400x300/?{{ $rp['img'] }}"
                         class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500"
                         alt="{{ $rp['name'] }}">
                </a>
                <div class="p-5">
                    <a href="/product/{{ urlencode($rp['name']) }}">
                        <h3 class="font-semibold text-gray-800 hover:text-green-600 transition-colors duration-300 mb-2">
                            {{ $rp['name'] }}
                        </h3>
                    </a>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-green-600">Rp {{ number_format($rp['price']) }}</span>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-star text-yellow-500 mr-1"></i>
                            {{ $rp['rating'] }}
                        </div>
                    </div>
                    <button onclick="addToCart('{{ $rp['name'] }}', {{ $rp['price'] }})"
                            class="w-full mt-4 bg-gray-100 hover:bg-green-600 hover:text-white text-gray-800 py-2 rounded-lg transition-all duration-300">
                        <i class="fas fa-cart-plus mr-2"></i>Tambah
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-900 text-white mt-16 py-8">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <div class="flex items-center justify-center space-x-3 mb-6">
            <div class="bg-white p-2 rounded-lg">
                <span class="text-green-600 text-xl font-bold">🏪</span>
            </div>
            <h2 class="text-2xl font-bold">WarungHub</h2>
        </div>
        <p class="text-gray-400">Marketplace sembako digital terpercaya untuk kebutuhan sehari-hari</p>
        <p class="text-gray-500 text-sm mt-6">© 2026 WarungHub — All rights reserved</p>
    </div>
</footer>

<!-- Floating Action Buttons -->
<div class="fixed bottom-6 right-6 flex flex-col space-y-4">
    <button onclick="scrollToTop()"
            class="bg-green-600 text-white p-4 rounded-full shadow-lg hover:bg-green-700 transition-all duration-300">
        <i class="fas fa-arrow-up text-xl"></i>
    </button>
    
    <button onclick="window.open('https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product['name']) }}')"
            class="bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition-all duration-300">
        <i class="fab fa-whatsapp text-2xl"></i>
    </button>
</div>

<script>
let currentQuantity = 1;

function updateQuantity(change) {
    const input = document.getElementById('quantity');
    let newValue = parseInt(input.value) + change;
    const maxStock = {{ $product['stock'] ?? 100 }};
    
    if (newValue < 1) newValue = 1;
    if (newValue > maxStock) newValue = maxStock;
    
    input.value = newValue;
    currentQuantity = newValue;
}

function changeMainImage(src) {
    document.getElementById('mainImage').src = src;
}

function addToCartWithQuantity() {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: '{{ $product['name'] }}',
            name: '{{ $product['name'] }}',
            price: {{ $product['price'] }},
            quantity: quantity
        })
    }).then(response => response.json())
      .then(data => {
          // Show success message
          alert(`✅ ${quantity} ${'{{ $product['name'] }}'} berhasil ditambahkan ke keranjang!`);
          // Optionally redirect to cart
          // window.location = '/cart';
      }).catch(error => {
          console.error('Error:', error);
          alert('❌ Gagal menambahkan ke keranjang. Silakan coba lagi.');
      });
}

function buyNow() {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: '{{ $product['name'] }}',
            name: '{{ $product['name'] }}',
            price: {{ $product['price'] }},
            quantity: quantity
        })
    }).then(() => {
        window.location = '/checkout';
    });
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Zoom effect for main image
document.getElementById('mainImage').addEventListener('click', function() {
    if (this.style.transform === 'scale(2)') {
        this.style.transform = 'scale(1)';
        this.style.cursor = 'zoom-in';
    } else {
        this.style.transform = 'scale(2)';
        this.style.cursor = 'zoom-out';
    }
});
</script>

</body>
</html>