@extends('admin.index')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Produk</h1>

<form action="/admin/products" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    <input name="name" placeholder="Nama Produk" class="w-full border p-2 rounded">
    <input name="price" placeholder="Harga" class="w-full border p-2 rounded">
    <input name="stock" placeholder="Stok" class="w-full border p-2 rounded">

    <select name="category_id" class="w-full border p-2 rounded">
        @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>

    <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
