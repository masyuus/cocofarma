@extends('layouts.admin')

@section('content')
    <!-- App Content Header -->
    <div class="app-content-header bg-gradient-warning text-white">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-white bg-opacity-25 me-3">
                            <i class="bi bi-pencil-square text-white fs-3"></i>
                        </div>
                        <div>
                            <h2 class="mb-0 fw-bold">Edit Produk</h2>
                            <p class="mb-0 opacity-75">Perbarui informasi produk {{ $product->name }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-white text-decoration-none">Produk</a></li>
                        <li class="breadcrumb-item text-white-50" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card product-edit-card">
                        <div class="card-header bg-white border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle bg-warning bg-opacity-10 me-3">
                                        <i class="bi bi-box-seam-fill text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0 text-dark fw-bold">Form Edit Produk</h4>
                                        <small class="text-muted">Update informasi produk dengan teliti</small>
                                    </div>
                                </div>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        
                        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="card-body">
                                <div class="row">
                                    <!-- Basic Information -->
                                    <div class="col-md-8">
                                        <h5 class="mb-3">Informasi Dasar</h5>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                       id="name" name="name" value="{{ old('name', $product->name) }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="code" class="form-label">Kode Produk <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('code') is-invalid @enderror" 
                                                       id="code" name="code" value="{{ old('code', $product->code) }}" required>
                                                @error('code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                                      id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="arang_kelapa" {{ old('category', $product->category) == 'arang_kelapa' ? 'selected' : '' }}>Arang Kelapa</option>
                                                    <option value="produk_hexa" {{ old('category', $product->category) == 'produk_hexa' ? 'selected' : '' }}>Produk Hexa</option>
                                                    <option value="bahan_baku" {{ old('category', $product->category) == 'bahan_baku' ? 'selected' : '' }}>Bahan Baku</option>
                                                </select>
                                                @error('category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                                    <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- Pricing & Stock -->
                                        <h5 class="mb-3 mt-4">Harga & Stok</h5>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="price" class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                       id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required>
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="stock_quantity" class="form-label">Jumlah Stok <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" 
                                                       id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0" required>
                                                @error('stock_quantity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <label for="minimum_stock" class="form-label">Stok Minimum <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control @error('minimum_stock') is-invalid @enderror" 
                                                       id="minimum_stock" name="minimum_stock" value="{{ old('minimum_stock', $product->minimum_stock) }}" step="0.01" min="0" required>
                                                @error('minimum_stock')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="unit" class="form-label">Satuan <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('unit') is-invalid @enderror" 
                                                       id="unit" name="unit" value="{{ old('unit', $product->unit) }}" placeholder="kg, pcs, liter, dll" required>
                                                @error('unit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="weight_per_unit" class="form-label">Berat per Satuan (kg)</label>
                                                <input type="number" class="form-control @error('weight_per_unit') is-invalid @enderror" 
                                                       id="weight_per_unit" name="weight_per_unit" value="{{ old('weight_per_unit', $product->weight_per_unit) }}" step="0.01" min="0">
                                                @error('weight_per_unit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <!-- Specifications -->
                                        <h5 class="mb-3 mt-4">Spesifikasi</h5>
                                        
                                        <div id="specifications-container">
                                            @if(old('specifications', $product->specifications))
                                                @foreach(old('specifications', $product->specifications) as $key => $value)
                                                    <div class="row mb-2 specification-row">
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="specifications[{{ $loop->index }}][key]" 
                                                                   value="{{ is_array($value) ? $key : $key }}" placeholder="Nama spesifikasi">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="specifications[{{ $loop->index }}][value]" 
                                                                   value="{{ is_array($value) ? $value['value'] ?? '' : $value }}" placeholder="Nilai spesifikasi">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" class="btn btn-outline-danger remove-specification">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        
                                        <button type="button" id="add-specification" class="btn btn-outline-primary">
                                            <i class="bi bi-plus-circle"></i> Tambah Spesifikasi
                                        </button>
                                    </div>
                                    
                                    <!-- Image Upload -->
                                    <div class="col-md-4">
                                        <h5 class="mb-3">Gambar Produk</h5>
                                        
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Gambar</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                   id="image" name="image" accept="image/*">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">Maksimal 2MB. Format: JPG, PNG, GIF</div>
                                        </div>
                                        
                                        <div class="text-center">
                                            <div id="image-preview" class="mb-3">
                                                @if($product->image)
                                                    <img src="{{ asset('storage/products/' . $product->image) }}" 
                                                         alt="{{ $product->name }}" 
                                                         class="img-fluid rounded border" 
                                                         style="max-height: 200px;">
                                                    <p class="text-muted mt-2">Gambar saat ini</p>
                                                @else
                                                    <div class="bg-light rounded border d-flex align-items-center justify-content-center" 
                                                         style="height: 200px;">
                                                        <div class="text-center">
                                                            <i class="bi bi-image display-4 text-muted"></i>
                                                            <p class="text-muted mt-2">Belum ada gambar</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle"></i> Update Produk
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <style>
        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .app-content-header.bg-gradient-warning {
            background: linear-gradient(135deg, #ffc107 0%, #ff8f00 100%);
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 1rem 1rem;
            box-shadow: 0 4px 6px rgba(255, 193, 7, 0.1);
        }
        
        .product-edit-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .product-edit-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .section-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #ffc107;
            margin: 0 -1.5rem 1.5rem -1.5rem;
            padding: 1rem 1.5rem;
        }
        
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }
        
        .form-select:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }
        
        .btn-add-spec {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-add-spec:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }
        
        .image-upload-area {
            border: 2px dashed #dee2e6;
            border-radius: 1rem;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            cursor: pointer;
        }
        
        .image-upload-area:hover {
            border-color: #ffc107;
            background: linear-gradient(135deg, #fff3cd 0%, #ffffff 100%);
        }
        
        .form-floating > label {
            color: #6c757d;
        }
        
        .specification-row {
            background: #f8f9fa;
            border-radius: 0.5rem;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .specification-row:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .current-image-container {
            position: relative;
            display: inline-block;
        }
        
        .current-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 0.5rem;
        }
        
        .current-image-container:hover .current-image-overlay {
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let specificationIndex = {{ count(old('specifications', $product->specifications ?? [])) }};
            
            // Add specification row
            document.getElementById('add-specification').addEventListener('click', function() {
                const container = document.getElementById('specifications-container');
                const row = document.createElement('div');
                row.className = 'specification-row';
                row.innerHTML = `
                    <div class="row g-2">
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="specifications[${specificationIndex}][key]" placeholder="Nama Spesifikasi">
                                <label>Nama Spesifikasi</label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="specifications[${specificationIndex}][value]" placeholder="Nilai">
                                <label>Nilai</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-outline-danger h-100 w-100 remove-specification">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                container.appendChild(row);
                specificationIndex++;
                
                // Add smooth animation
                row.style.opacity = '0';
                row.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    row.style.transition = 'all 0.3s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, 10);
            });
            
            // Remove specification row
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-specification') || e.target.closest('.remove-specification')) {
                    const row = e.target.closest('.specification-row');
                    
                    Swal.fire({
                        title: 'Hapus Spesifikasi?',
                        text: 'Spesifikasi ini akan dihapus dari produk',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            row.style.transition = 'all 0.3s ease';
                            row.style.opacity = '0';
                            row.style.transform = 'translateX(-20px)';
                            setTimeout(() => {
                                row.remove();
                            }, 300);
                        }
                    });
                }
            });
            
            // Image upload functionality
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.innerHTML = `
                            <div class="current-image-container">
                                <img src="${e.target.result}" 
                                     alt="Preview" 
                                     class="img-fluid rounded border" 
                                     style="max-height: 300px; width: 100%; object-fit: cover;">
                                <div class="current-image-overlay">
                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="clearImagePreview()">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </div>
                            <p class="text-muted mt-2 mb-0">Preview gambar baru</p>
                        `;
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Real-time preview calculations
            function updatePreview() {
                const price = document.getElementById('price').value;
                const stock = document.getElementById('stock_quantity').value;
                
                document.getElementById('preview-price').textContent = price ? 
                    'Rp ' + new Intl.NumberFormat('id-ID').format(price) : '-';
                document.getElementById('preview-stock').textContent = stock ? 
                    new Intl.NumberFormat('id-ID').format(stock) : '-';
                document.getElementById('preview-value').textContent = (price && stock) ? 
                    'Rp ' + new Intl.NumberFormat('id-ID').format(price * stock) : '-';
            }
            
            document.getElementById('price').addEventListener('input', updatePreview);
            document.getElementById('stock_quantity').addEventListener('input', updatePreview);
            
            // Initial preview update
            updatePreview();
            
            // Form submission with SweetAlert
            document.getElementById('productForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Konfirmasi Perubahan',
                    text: 'Apakah Anda yakin ingin menyimpan perubahan ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#ffc107',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="bi bi-check-circle"></i> Ya, Update',
                    cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                    customClass: {
                        confirmButton: 'btn btn-warning',
                        cancelButton: 'btn btn-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading
                        Swal.fire({
                            title: 'Memperbarui...',
                            text: 'Mohon tunggu sebentar',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        
                        // Submit form
                        this.submit();
                    }
                });
            });
        });
        
        function clearImagePreview() {
            document.getElementById('image').value = '';
            @if($product->image)
                document.getElementById('image-preview').innerHTML = `
                    <div class="current-image-container">
                        <img src="{{ asset('storage/products/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid rounded border" 
                             style="max-height: 300px;">
                        <div class="current-image-overlay">
                            <span class="text-white"><i class="bi bi-image"></i> Gambar Saat Ini</span>
                        </div>
                    </div>
                    <p class="text-muted mt-2">Gambar produk saat ini</p>
                `;
            @else
                document.getElementById('image-preview').innerHTML = `
                    <div class="bg-light rounded border d-flex align-items-center justify-content-center" 
                         style="height: 200px;">
                        <div class="text-center">
                            <i class="bi bi-image display-4 text-muted"></i>
                            <p class="text-muted mt-2">Belum ada gambar</p>
                        </div>
                    </div>
                `;
            @endif
        }
    </script>
@endsection