@extends('admin.layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Produk Baru</h1>
            <p class="text-gray-600">Tambahkan produk baru ke katalog WarungHub</p>
        </div>
        <a href="{{ route('admin.products.index') }}" 
           class="text-gray-600 hover:text-gray-800 flex items-center space-x-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>
    
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
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
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="Contoh: Beras Ramos 5kg">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi Produk
                            </label>
                            <textarea name="description" 
                                      rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                      placeholder="Deskripsi detail produk..."></textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    SKU (Stock Keeping Unit)
                                </label>
                                <input type="text" 
                                       name="sku"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="WH-BRS-001">
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
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                       required
                                       min="0"
                                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="0">
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
                                       min="0"
                                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="0">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="on_sale" class="rounded">
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
                                   required
                                   min="0"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                   placeholder="0">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Satuan
                            </label>
                            <select name="unit" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="pcs">Pcs</option>
                                <option value="kg">Kg</option>
                                <option value="liter">Liter</option>
                                <option value="pack">Pack</option>
                                <option value="box">Box</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Minimum Order
                        </label>
                        <input type="number" 
                               name="min_order" 
                               min="1"
                               value="1"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                </div>
                
                <!-- Specifications -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-clipboard-list mr-2 text-green-600"></i>
                        Spesifikasi
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Berat (gram)</label>
                                <input type="number" 
                                       name="weight"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Dimensi (cm)</label>
                                <input type="text" 
                                       name="dimensions"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="P x L x T">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Merek</label>
                            <input type="text" 
                                   name="brand"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column -->
            <div class="space-y-6">
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
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="featured" class="rounded">
                                <span class="text-sm text-gray-700">Produk Unggulan</span>
                            </label>
                        </div>
                        
                        <div>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="best_seller" class="rounded">
                                <span class="text-sm text-gray-700">Produk Terlaris</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Featured Image -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-image mr-2 text-green-600"></i>
                        Gambar Utama
                    </h2>
                    
                    <div class="space-y-4">
                        <div id="imagePreview" class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-500">Upload gambar produk</p>
                            <p class="text-xs text-gray-400">Rekomendasi: 800x800px</p>
                        </div>
                        
                        <input type="file" 
                               name="image" 
                               id="imageInput"
                               accept="image/*"
                               class="hidden"
                               onchange="previewImage(event)">
                        
                        <button type="button" 
                                onclick="document.getElementById('imageInput').click()"
                                class="w-full py-2 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 text-gray-600 hover:text-green-600">
                            <i class="fas fa-upload mr-2"></i>Pilih Gambar
                        </button>
                    </div>
                </div>
                
                <!-- Gallery Images -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-images mr-2 text-green-600"></i>
                        Galeri Gambar
                    </h2>
                    
                    <div class="space-y-4">
                        <div id="galleryPreview" class="grid grid-cols-2 gap-2">
                            <!-- Gallery preview will appear here -->
                        </div>
                        
                        <input type="file" 
                               name="gallery[]" 
                               id="galleryInput"
                               accept="image/*"
                               class="hidden"
                               multiple
                               onchange="previewGallery(event)">
                        
                        <button type="button" 
                                onclick="document.getElementById('galleryInput').click()"
                                class="w-full py-2 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 text-gray-600 hover:text-green-600">
                            <i class="fas fa-plus mr-2"></i>Tambah Gambar
                        </button>
                    </div>
                </div>
                
                <!-- SEO Settings -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-search mr-2 text-green-600"></i>
                        SEO
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" 
                                   name="meta_title"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea name="meta_description" 
                                      rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Save Button -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="space-y-4">
                        <button type="submit" 
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-lg">
                            <i class="fas fa-save mr-2"></i>Simpan Produk
                        </button>
                        
                        <button type="button" 
                                onclick="window.location.href='{{ route('admin.products.index') }}'"
                                class="w-full border border-gray-300 text-gray-700 font-medium py-3 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    const preview = document.getElementById('imagePreview');
    
    reader.onload = function() {
        preview.innerHTML = `
            <img src="${reader.result}" class="w-full h-auto rounded-lg">
            <button type="button" onclick="removeImage()" class="mt-2 text-red-600 hover:text-red-800">
                <i class="fas fa-trash mr-1"></i>Hapus
            </button>
        `;
    }
    
    reader.readAsDataURL(event.target.files[0]);
}

function removeImage() {
    document.getElementById('imageInput').value = '';
    document.getElementById('imagePreview').innerHTML = `
        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
        <p class="text-sm text-gray-500">Upload gambar produk</p>
        <p class="text-xs text-gray-400">Rekomendasi: 800x800px</p>
    `;
}

function previewGallery(event) {
    const files = event.target.files;
    const preview = document.getElementById('galleryPreview');
    
    for (let i = 0; i < files.length; i++) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative';
            div.innerHTML = `
                <img src="${e.target.result}" class="w-full h-24 object-cover rounded-lg">
                <button type="button" onclick="removeGalleryImage(this)" 
                        class="absolute -top-2 -right-2 bg-red-500 text-white w-6 h-6 rounded-full text-xs">
                    ×
                </button>
            `;
            preview.appendChild(div);
        }
        
        reader.readAsDataURL(files[i]);
    }
}

function removeGalleryImage(button) {
    button.parentElement.remove();
}

// Auto generate SKU
document.querySelector('input[name="name"]').addEventListener('input', function(e) {
    const skuField = document.querySelector('input[name="sku"]');
    if (!skuField.value) {
        const name = e.target.value;
        const sku = 'WH-' + name.substring(0, 3).toUpperCase().replace(/\s/g, '');
        skuField.value = sku;
    }
});
</script>
@endsection