@extends('admin.index')

@section('content')
<h1 class="text-xl font-bold mb-4">Kategori</h1>

<form action="/admin/categories" method="POST" class="flex space-x-2 mb-4">
    @csrf
    <input name="name" class="border p-2 flex-1 rounded" placeholder="Nama kategori">
    <button class="bg-green-600 text-white px-4 rounded">Tambah</button>
</form>

<table class="bg-white w-full rounded shadow">
@foreach($categories as $c)
<tr class="border-b">
    <td class="p-3">{{ $c->name }}</td>
</tr>
@endforeach
</table>
@endsection
