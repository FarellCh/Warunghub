<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - WarungHub')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
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
        
        .active-link {
            background-color: #059669;
            color: white;
        }
        
        .active-link:hover {
            background-color: #047857;
        }
    </style>
    
    @stack('styles')
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <div class="bg-green-600 p-2 rounded-lg">
                        <i class="fas fa-store text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">WarungHub</h1>
                        <p class="text-xs text-gray-400">Admin Panel</p>
                    </div>
                </a>
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
        <main class="flex-1 md:ml-64">
            <!-- Page Header -->
            <div class="bg-white shadow">
                <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="py-6">
                        <h1 class="text-2xl font-semibold text-gray-900">
                            @yield('page-title')
                        </h1>
                        @hasSection('page-description')
                        <p class="mt-1 text-sm text-gray-600">
                            @yield('page-description')
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Page Content -->
            <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 md:hidden hidden"></div>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.querySelector('.sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        
        if (mobileMenuBtn && sidebar && mobileOverlay) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                mobileOverlay.classList.toggle('hidden');
            });
            
            mobileOverlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                mobileOverlay.classList.add('hidden');
            });
        }
        
        // Close mobile menu on larger screens
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('active');
                mobileOverlay.classList.add('hidden');
            }
        });
        
        // Auto-hide alerts
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>