<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - WarungHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        
        .active-link {
            background-color: #059669;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100">
    
    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="md:hidden fixed top-4 left-4 z-50 bg-green-600 text-white p-3 rounded-lg shadow-lg">
        <i class="fas fa-bars"></i>
    </button>

    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-gray-900 text-white min-h-screen fixed md:relative z-40">
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center space-x-3">
                    <div class="bg-green-600 p-2 rounded-lg">
                        <i class="fas fa-store text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">WarungHub</h1>
                        <p class="text-xs text-gray-400">Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <!-- User Info -->
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'active-link' : '' }}">
                            <i class="fas fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" 
                           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.products.*') ? 'active-link' : '' }}">
                            <i class="fas fa-box"></i>
                            <span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" 
                           class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.categories.*') ? 'active-link' : '' }}">
                            <i class="fas fa-tags"></i>
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Pesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800">
                            <i class="fas fa-users"></i>
                            <span>Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800">
                            <i class="fas fa-chart-bar"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800">
                            <i class="fas fa-cog"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Logout -->
            <div class="absolute bottom-0 w-full p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 w-full text-left">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 md:ml-64 p-4 md:p-6">
            <!-- Header -->
            <div class="bg-white rounded-xl shadow p-6 mb-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                        <p class="text-gray-600">Ringkasan aktivitas WarungHub</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button id="notifBtn" class="p-2 rounded-full hover:bg-gray-100">
                                <i class="fas fa-bell text-xl text-gray-600"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">3</span>
                            </button>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm text-gray-500">Terakhir login</p>
                            <p class="font-semibold">{{ now()->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Pendapatan</p>
                            <p class="text-2xl font-bold text-gray-800">Rp 25.4 JT</p>
                            <p class="text-green-600 text-sm mt-1"><i class="fas fa-arrow-up mr-1"></i> 12.5%</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-wallet text-2xl text-green-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Produk</p>
                            <p class="text-2xl font-bold text-gray-800">148</p>
                            <p class="text-green-600 text-sm mt-1"><i class="fas fa-plus mr-1"></i> 5 baru</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fas fa-box text-2xl text-blue-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Pesanan Hari Ini</p>
                            <p class="text-2xl font-bold text-gray-800">42</p>
                            <p class="text-green-600 text-sm mt-1"><i class="fas fa-shopping-cart mr-1"></i> 8 diproses</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <i class="fas fa-shopping-bag text-2xl text-yellow-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Pelanggan Baru</p>
                            <p class="text-2xl font-bold text-gray-800">28</p>
                            <p class="text-green-600 text-sm mt-1"><i class="fas fa-users mr-1"></i> Minggu ini</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <i class="fas fa-user-plus text-2xl text-purple-600"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Sales Chart -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Statistik Penjualan</h2>
                        <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                            <option>Minggu ini</option>
                            <option>Bulan ini</option>
                            <option>Tahun ini</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
                
                <!-- Top Products -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Produk Terlaris</h2>
                    <div class="space-y-4">
                        @foreach([
                            ['name' => 'Beras Ramos 5kg', 'sales' => 1240, 'revenue' => 93000000],
                            ['name' => 'Minyak Goreng 2L', 'sales' => 980, 'revenue' => 37240000],
                            ['name' => 'Telur Ayam 1kg', 'sales' => 1560, 'revenue' => 45240000],
                            ['name' => 'Gula Pasir 1kg', 'sales' => 2100, 'revenue' => 31500000],
                            ['name' => 'Mie Instan', 'sales' => 3200, 'revenue' => 9600000]
                        ] as $product)
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-gray-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium">{{ $product['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ number_format($product['sales']) }} terjual</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-green-600">Rp {{ number_format($product['revenue']) }}</p>
                                <p class="text-xs text-gray-500">Pendapatan</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Recent Orders -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Pesanan Terbaru</h2>
                    <a href="#" class="text-green-600 hover:text-green-700 font-medium">Lihat Semua</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-500 text-sm border-b">
                                <th class="pb-3">ID Pesanan</th>
                                <th class="pb-3">Pelanggan</th>
                                <th class="pb-3">Tanggal</th>
                                <th class="pb-3">Total</th>
                                <th class="pb-3">Status</th>
                                <th class="pb-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['id' => 'WH001', 'customer' => 'Budi Santoso', 'date' => '14 Jan 2026', 'total' => 185000, 'status' => 'completed'],
                                ['id' => 'WH002', 'customer' => 'Sari Dewi', 'date' => '14 Jan 2026', 'total' => 92000, 'status' => 'processing'],
                                ['id' => 'WH003', 'customer' => 'Agus Wijaya', 'date' => '13 Jan 2026', 'total' => 256000, 'status' => 'pending'],
                                ['id' => 'WH004', 'customer' => 'Rina Setiawan', 'date' => '13 Jan 2026', 'total' => 75000, 'status' => 'completed'],
                                ['id' => 'WH005', 'customer' => 'Dian Pertiwi', 'date' => '12 Jan 2026', 'total' => 142000, 'status' => 'shipped']
                            ] as $order)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-4 font-medium">{{ $order['id'] }}</td>
                                <td class="py-4">{{ $order['customer'] }}</td>
                                <td class="py-4">{{ $order['date'] }}</td>
                                <td class="py-4 font-bold">Rp {{ number_format($order['total']) }}</td>
                                <td class="py-4">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'processing' => 'bg-blue-100 text-blue-800',
                                            'shipped' => 'bg-purple-100 text-purple-800',
                                            'completed' => 'bg-green-100 text-green-800'
                                        ];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColors[$order['status']] }}">
                                        {{ ucfirst($order['status']) }}
                                    </span>
                                </td>
                                <td class="py-4">
                                    <button class="text-green-600 hover:text-green-700">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden hidden"></div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.querySelector('.sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        
        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            mobileOverlay.classList.toggle('hidden');
        });
        
        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            mobileOverlay.classList.add('hidden');
        });
        
        // Sales Chart
        const salesChart = new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [3500000, 4200000, 3800000, 5100000, 4900000, 6200000, 5800000],
                    borderColor: '#059669',
                    backgroundColor: 'rgba(5, 150, 105, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'JT';
                            }
                        }
                    }
                }
            }
        });
        
        // Notification Toggle
        const notifBtn = document.getElementById('notifBtn');
        notifBtn.addEventListener('click', () => {
            alert('Fitur notifikasi akan ditampilkan di sini');
        });
    </script>
</body>
</html>