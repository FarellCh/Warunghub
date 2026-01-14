@extends('admin.index')

@section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-xl font-bold">Data Produk</h1>
    <a href="/admin/products/create" class="bg-green-600 text-white px-4 py-2 rounded">
        + Tambah Produk
    </a>
</div>

<table class="w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-green-600 text-white">
        <tr>
            <th class="p-3 text-left">Nama</th>
            <th class="p-3">Harga</th>
            <th class="p-3">Stok</th>
            <th class="p-3">Kategori</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr class="border-b">
            <td class="p-3">{{ $p->name }}</td>
            <td class="p-3">Rp {{ number_format($p->price) }}</td>
            <td class="p-3 text-center">{{ $p->stock }}</td>
            <td class="p-3 text-center">{{ $p->category->name }}</td>
            <td class="p-3 text-center space-x-2">
                <a href="/admin/products/{{ $p->id }}/edit" class="text-blue-600">Edit</a>
                <form action="/admin/products/{{ $p->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
