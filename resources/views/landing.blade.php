<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MarketHub — Buy & Sell Anything</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-indigo-600">MarketHub</h1>
    <div class="space-x-6">
      <a href="{{ route('home') }}" class="hover:text-indigo-600">Home</a>
      <a href="#" class="hover:text-indigo-600">Products</a>
      <a href="#" class="hover:text-indigo-600">Categories</a>
      <a href="{{ route('login') }}" class="hover:text-indigo-600">Login</a>
      <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Register</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
    <div>
      <h2 class="text-5xl font-bold mb-6">Buy & Sell Anything in One Place</h2>
      <p class="text-lg mb-6">Marketplace modern untuk UMKM, seller, dan pembeli dalam satu platform.</p>
      <div class="space-x-4">
        <button class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Explore Products</button>
        <button class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-indigo-600">Become Seller</button>
      </div>
    </div>
    <img src="https://cdn-icons-png.flaticon.com/512/891/891462.png" class="w-full">
  </div>
</section>

<!-- CATEGORIES -->
<section class="py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h3 class="text-3xl font-bold text-center mb-10">Popular Categories</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg text-center">📱 Electronics</div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg text-center">👕 Fashion</div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg text-center">🏠 Home</div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg text-center">🎮 Gaming</div>
    </div>
  </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="bg-gray-100 py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h3 class="text-3xl font-bold text-center mb-10">Featured Products</h3>
    <div class="grid md:grid-cols-3 gap-6">
      
      <div class="bg-white rounded-xl shadow p-4">
        <img src="https://source.unsplash.com/300x200/?laptop" class="rounded-lg mb-4">
        <h4 class="font-semibold">Laptop Pro</h4>
        <p class="text-indigo-600 font-bold">$1200</p>
      </div>

      <div class="bg-white rounded-xl shadow p-4">
        <img src="https://source.unsplash.com/300x200/?shoes" class="rounded-lg mb-4">
        <h4 class="font-semibold">Sneakers</h4>
        <p class="text-indigo-600 font-bold">$89</p>
      </div>

      <div class="bg-white rounded-xl shadow p-4">
        <img src="https://source.unsplash.com/300x200/?phone" class="rounded-lg mb-4">
        <h4 class="font-semibold">Smartphone</h4>
        <p class="text-indigo-600 font-bold">$499</p>
      </div>

    </div>
  </div>
</section>

<!-- WHY US -->
<section class="py-16">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h3 class="text-3xl font-bold mb-8">Why Choose MarketHub?</h3>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-xl shadow">
        🚀 Fast Transactions
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        🔒 Secure Payments
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        📦 Easy Shipping
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="bg-indigo-600 text-white py-16 text-center">
  <h3 class="text-4xl font-bold mb-4">Start Selling Today</h3>
  <p class="mb-6">Join thousands of sellers and grow your business</p>
  <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">
    Create Store
  </button>
</section>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-400 py-10">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-6">
    <div>
      <h4 class="text-white font-bold text-lg">MarketHub</h4>
      <p>Modern marketplace for everyone.</p>
    </div>
    <div>
      <p>About</p>
      <p>Contact</p>
      <p>Terms</p>
    </div>
    <div>
      <p>Instagram</p>
      <p>Twitter</p>
      <p>Facebook</p>
    </div>
  </div>
</footer>

</body>
</html>
