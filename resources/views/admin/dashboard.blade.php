@extends('admin.index')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-4 gap-6">
    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Total Produk</h3>
        <p class="text-3xl font-bold">{{ $totalProducts }}</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Total Kategori</h3>
        <p class="text-3xl font-bold">{{ $totalCategories }}</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Total Transaksi</h3>
        <p class="text-3xl font-bold">{{ $totalTransactions }}</p>
    </div>

    <div class="bg-white p-5 rounded shadow">
        <h3 class="text-gray-500">Omzet</h3>
        <p class="text-3xl font-bold">Rp {{ number_format($totalRevenue) }}</p>
    </div>
</div>
@endsection
