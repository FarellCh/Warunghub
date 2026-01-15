@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Produk</h1>
            <p class="text-gray-600">Edit produk: {{ $product->name }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.products.index') }}" 
               class="text-gray-600 hover:text-gray-800 flex items-center space-x-2">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
            
            <button type="button" 
                    onclick="document.querySelector('form').submit()"
                    class="bg-green-600 hover:bg-green-700 text-white font-medium px-5 py-2 rounded-lg flex items-center space-x-2">
                <i class="fas fa-save"></i>
                <span>Simpan Perubahan</span>
            </button>
        </div>
    </div>
    
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-info-circle mr-2 text-green-600"></i>
                        Informasi Dasar
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Produk <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   value="{{ old('name', $product->name) }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Produk
                            </label>
                            <textarea name="description" 
                                      rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">{{ old('description', $product->description) }}</textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    SKU (Stock Keeping Unit)
                                </label>
                                <input type="text" 
                                       name="sku"
                                       value="{{ old('sku', $product->sku) }}"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select name="category_id" 
                                        required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pricing -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-tag mr-2 text-green-600"></i>
                        Harga
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Dasar <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                <input type="number" 
                                       name="price" 
                                       value="{{ old('price', $product->price) }}"
                                       required
                                       min="0"
                                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga Diskon
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                                <input type="number" 
                                       name="discount_price" 
                                       value="{{ old('discount_price', $product->discount_price) }}"
                                       min="0"
                                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" 
                                   name="on_sale" 
                                   value="1"
                                   {{ $product->on_sale ? 'checked' : '' }}
                                   class="rounded">
                            <span class="text-sm text-gray-700">Tandai sebagai produk diskon</span>
                        </label>
                    </div>
                </div>
                
                <!-- Inventory -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-boxes mr-2 text-green-600"></i>
                        Inventori
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Stok <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   name="stock" 
                                   value="{{ old('stock', $product->stock) }}"
                                   required
                                   min="0"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Satuan
                            </label>
                            <select name="unit" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="pcs" {{ $product->unit == 'pcs' ? 'selected' : '' }}>Pcs</option>
                                <option value="kg" {{ $product->unit == 'kg' ? 'selected' : '' }}>Kg</option>
                                <option value="liter" {{ $product->unit == 'liter' ? 'selected' : '' }}>Liter</option>
                                <option value="pack" {{ $product->unit == 'pack' ? 'selected' : '' }}>Pack</option>
                                <option value="box" {{ $product->unit == 'box' ? 'selected' : '' }}>Box</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Minimum Order
                        </label>
                        <input type="number" 
                               name="min_order" 
                               value="{{ old('min_order', $product->min_order) }}"
                               min="1"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Current Image -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-image mr-2 text-green-600"></i>
                        Gambar Saat Ini
                    </h2>
                    
                    <div class="space-y-4">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="w-full h-auto rounded-lg mb-2"
                             alt="{{ $product->name }}">
                        @else
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                            <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Tidak ada gambar</p>
                        </div>
                        @endif
                        
                        <input type="file" 
                               name="image" 
                               id="imageInput"
                               accept="image/*"
                               class="hidden"
                               onchange="previewImage(event)">
                        
                        <button type="button" 
                                onclick="document.getElementById('imageInput').click()"
                                class="w-full py-2 border border-gray-300 rounded-lg hover:border-green-500 text-gray-600 hover:text-green-600">
                            <i class="fas fa-upload mr-2"></i>Ubah Gambar
                        </button>
                        
                        @if($product->image)
                        <label class="flex items-center space-x-2 text-sm">
                            <input type="checkbox" name="remove_image" class="rounded">
                            <span class="text-red-600">Hapus gambar saat ini</span>
                        </label>
                        @endif
                    </div>
                </div>
                
                <!-- Status & Visibility -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-eye mr-2 text-green-600"></i>
                        Status & Visibilitas
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                                <option value="draft" {{ $product->status == 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" 
                                       name="featured" 
                                       value="1"
                                       {{ $product->featured ? 'checked' : '' }}
                                       class="rounded">
                                <span class="text-sm text-gray-700">Produk Unggulan</span>
                            </label>
                        </div>
                        
                        <div>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" 
                                       name="best_seller" 
                                       value="1"
                                       {{ $product->best_seller ? 'checked' : '' }}
                                       class="rounded">
                                <span class="text-sm text-gray-700">Produk Terlaris</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Actions -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-cog mr-2 text-green-600"></i>
                        Tindakan Lainnya
                    </h2>
                    
                    <div class="space-y-4">
                        <button type="button" 
                                onclick="duplicateProduct()"
                                class="w-full py-2 border border-gray-300 rounded-lg hover:border-blue-500 text-gray-600 hover:text-blue-600">
                            <i class="fas fa-copy mr-2"></i>Duplikat Produk
                        </button>
                        
                        <a href="{{ route('admin.products.show', $product->id) }}" 
                           target="_blank"
                           class="block w-full py-2 border border-gray-300 rounded-lg hover:border-green-500 text-gray-600 hover:text-green-600 text-center">
                            <i class="fas fa-eye mr-2"></i>Pratinjau
                        </a>
                    </div>
                </div>
                
                <!-- Danger Zone -->
                <div class="bg-white rounded-xl shadow p-6 border border-red-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2 text-red-600"></i>
                        Zona Bahaya
                    </h2>
                    
                    <div class="space-y-4">
                        <button type="button" 
                                onclick="if(confirm('Yakin menghapus produk ini?')) { document.getElementById('deleteForm').submit(); }"
                                class="w-full py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                            <i class="fas fa-trash mr-2"></i>Hapus Produk
                        </button>
                        
                        <p class="text-xs text-gray-500">
                            Tindakan ini tidak dapat dibatalkan. Semua data produk akan dihapus secara permanen.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Delete Form -->
    <form id="deleteForm" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    const preview = document.querySelector('.bg-white.rounded-xl.shadow.p-6 img');
    
    if (preview) {
        reader.onload = function() {
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
}

function duplicateProduct() {
    if (confirm('Buat duplikat produk ini?')) {
        fetch('{{ route("admin.products.duplicate", $product->id) }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Produk berhasil diduplikat!');
                window.location.href = '{{ route("admin.products.index") }}';
            }
        });
    }
}

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const price = document.querySelector('input[name="price"]').value;
    const discount = document.querySelector('input[name="discount_price"]').value;
    
    if (parseFloat(discount) > parseFloat(price)) {
        e.preventDefault();
        alert('Harga diskon tidak boleh lebih besar dari harga dasar!');
    }
});
</script>
@endsection