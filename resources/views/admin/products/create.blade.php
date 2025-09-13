@extends('layouts.admin')

@section('content')
    <!-- App Content Header -->
    <div class="app-content-header bg-gradient-primary text-white">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center">
                        <div class="icon-circle bg-white bg-opacity-25 me-3">
                            <i class="bi bi-plus-circle-fill text-white fs-3"></i>
                        </div>
                        <div>
                            <h2 class="mb-0 fw-bold">Tambah Produk Baru</h2>
                            <p class="mb-0 opacity-75">Kelola inventori produk Cocofarma</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-white text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-white text-decoration-none">Produk</a></li>
                        <li class="breadcrumb-item text-white-50" aria-current="page">Tambah</li>
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
                    <div class="card product-form-card">
                        <div class="card-header bg-white border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="icon-circle bg-primary bg-opacity-10 me-3">
                                        <i class="bi bi-box-seam-fill text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <h4 class="mb-0 text-dark fw-bold">Form Produk Baru</h4>
                                        <small class="text-muted">Lengkapi informasi produk dengan teliti</small>
                                    </div>
                                </div>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary rounded-pill">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                            @csrf
                            
                            <div class="card-body p-4">
                                <div class="row">
                                    <!-- Basic Information Section -->
                                    <div class="col-lg-8">
                                        <div class="section-header">
                                            <h5 class="mb-0 fw-bold text-primary">
                                                <i class="bi bi-info-circle me-2"></i>Informasi Dasar
                                            </h5>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                           id="name" name="name" value="{{ old('name') }}" placeholder="Nama Produk" required>
                                                    <label for="name">Nama Produk <span class="text-danger">*</span></label>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control @error('code') is-invalid @enderror" 
                                                           id="code" name="code" value="{{ old('code') }}" placeholder="Kode Produk" required>
                                                    <label for="code">Kode Produk <span class="text-danger">*</span></label>
                                                    @error('code')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <div class="form-floating">
                                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                                          id="description" name="description" style="height: 120px" placeholder="Deskripsi">{{ old('description') }}</textarea>
                                                <label for="description">Deskripsi Produk</label>
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3 mt-2">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="arang_kelapa" {{ old('category') == 'arang_kelapa' ? 'selected' : '' }}>🥥 Arang Kelapa</option>
                                                        <option value="produk_hexa" {{ old('category') == 'produk_hexa' ? 'selected' : '' }}>⬡ Produk Hexa</option>
                                                        <option value="bahan_baku" {{ old('category') == 'bahan_baku' ? 'selected' : '' }}>🏭 Bahan Baku</option>
                                                    </select>
                                                    <label for="category">Kategori Produk <span class="text-danger">*</span></label>
                                                    @error('category')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>✅ Aktif</option>
                                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>❌ Tidak Aktif</option>
                                                    </select>
                                                    <label for="status">Status Produk <span class="text-danger">*</span></label>
                                                    @error('status')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Pricing & Stock Section -->
                                        <div class="section-header mt-4">
                                            <h5 class="mb-0 fw-bold text-success">
                                                <i class="bi bi-currency-exchange me-2"></i>Harga & Inventori
                                            </h5>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                           id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" placeholder="Harga" required>
                                                    <label for="price">💰 Harga (Rp) <span class="text-danger">*</span></label>
                                                    @error('price')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" 
                                                           id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}" min="0" placeholder="Stok" required>
                                                    <label for="stock_quantity">📦 Jumlah Stok <span class="text-danger">*</span></label>
                                                    @error('stock_quantity')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control @error('minimum_stock') is-invalid @enderror" 
                                                           id="minimum_stock" name="minimum_stock" value="{{ old('minimum_stock') }}" step="0.01" min="0" placeholder="Minimum" required>
                                                    <label for="minimum_stock">⚠️ Stok Minimum <span class="text-danger">*</span></label>
                                                    @error('minimum_stock')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3 mt-2">
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control @error('unit') is-invalid @enderror" 
                                                           id="unit" name="unit" value="{{ old('unit') }}" placeholder="Satuan" required>
                                                    <label for="unit">📏 Satuan <span class="text-danger">*</span></label>
                                                    @error('unit')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control @error('weight_per_unit') is-invalid @enderror" 
                                                           id="weight_per_unit" name="weight_per_unit" value="{{ old('weight_per_unit') }}" step="0.01" min="0" placeholder="Berat">
                                                    <label for="weight_per_unit">⚖️ Berat per Satuan (kg)</label>
                                                    @error('weight_per_unit')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Specifications Section -->
                                        <div class="section-header mt-4">
                                            <h5 class="mb-0 fw-bold text-info">
                                                <i class="bi bi-gear-fill me-2"></i>Spesifikasi Produk
                                            </h5>
                                        </div>
                                        
                                        <div id="specifications-container" class="mb-3">
                                            @if(old('specifications'))
                                                @foreach(old('specifications') as $index => $spec)
                                                    <div class="specification-row">
                                                        <div class="row g-2">
                                                            <div class="col-md-5">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" name="specifications[{{ $index }}][key]" 
                                                                           value="{{ $spec['key'] ?? '' }}" placeholder="Nama Spesifikasi">
                                                                    <label>Nama Spesifikasi</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control" name="specifications[{{ $index }}][value]" 
                                                                           value="{{ $spec['value'] ?? '' }}" placeholder="Nilai">
                                                                    <label>Nilai</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button" class="btn btn-outline-danger h-100 w-100 remove-specification">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        
                                        <button type="button" id="add-specification" class="btn btn-add-spec text-white">
                                            <i class="bi bi-plus-circle me-2"></i>Tambah Spesifikasi
                                        </button>
                                    </div>
                                    
                                    <!-- Image Upload Section -->
                                    <div class="col-lg-4">
                                        <div class="section-header">
                                            <h5 class="mb-0 fw-bold text-warning">
                                                <i class="bi bi-image-fill me-2"></i>Gambar Produk
                                            </h5>
                                        </div>
                                        
                                        <div class="image-upload-area text-center p-4">
                                            <input type="file" class="form-control d-none @error('image') is-invalid @enderror" 
                                                   id="image" name="image" accept="image/*">
                                            <div id="image-preview">
                                                <div class="upload-placeholder">
                                                    <i class="bi bi-cloud-upload display-1 text-muted mb-3"></i>
                                                    <h5 class="text-muted mb-2">Upload Gambar Produk</h5>
                                                    <p class="text-muted mb-3">Klik untuk memilih gambar<br>atau drag & drop disini</p>
                                                    <button type="button" class="btn btn-outline-primary rounded-pill" onclick="document.getElementById('image').click()">
                                                        <i class="bi bi-folder2-open me-2"></i>Pilih File
                                                    </button>
                                                    <div class="mt-3">
                                                        <small class="text-muted">Format: JPG, PNG, GIF | Max: 2MB</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Product Stats Preview -->
                                        <div class="mt-4 p-3 bg-light rounded-3">
                                            <h6 class="fw-bold text-dark mb-3"><i class="bi bi-bar-chart me-2"></i>Preview Statistik</h6>
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <div class="border-end">
                                                        <div class="text-primary fw-bold" id="preview-price">-</div>
                                                        <small class="text-muted">Harga</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="border-end">
                                                        <div class="text-success fw-bold" id="preview-stock">-</div>
                                                        <small class="text-muted">Stok</small>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="text-warning fw-bold" id="preview-value">-</div>
                                                    <small class="text-muted">Total Nilai</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer bg-white border-0 p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-light rounded-pill px-4">
                                        <i class="bi bi-arrow-left me-2"></i>Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded-pill px-5" id="submitBtn">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Produk
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
        
        .app-content-header.bg-gradient-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 1rem 1rem;
            box-shadow: 0 4px 6px rgba(0, 123, 255, 0.1);
        }
        
        .product-form-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .product-form-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .section-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #007bff;
            margin: 0 -1.5rem 1.5rem -1.5rem;
            padding: 1rem 1.5rem;
        }
        
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
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
            border-color: #007bff;
            background: linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%);
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
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let specificationIndex = {{ count(old('specifications', [])) }};
            
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
                    row.style.transition = 'all 0.3s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-20px)';
                    setTimeout(() => {
                        row.remove();
                    }, 300);
                }
            });
            
            // Image upload with drag & drop
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            const uploadArea = document.querySelector('.image-upload-area');
            
            // Click to upload
            uploadArea.addEventListener('click', function() {
                imageInput.click();
            });
            
            // File input change
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    showImagePreview(file);
                }
            });
            
            // Drag & drop functionality
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#007bff';
                uploadArea.style.background = 'linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%)';
            });
            
            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#dee2e6';
                uploadArea.style.background = 'linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%)';
            });
            
            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.style.borderColor = '#dee2e6';
                uploadArea.style.background = 'linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%)';
                
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    imageInput.files = files;
                    showImagePreview(files[0]);
                }
            });
            
            function showImagePreview(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML = `
                        <img src="${e.target.result}" 
                             alt="Preview" 
                             class="img-fluid rounded border" 
                             style="max-height: 250px; width: 100%; object-fit: cover;">
                        <p class="text-muted mt-2 mb-0">Preview gambar baru</p>
                        <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="clearImagePreview()">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    `;
                };
                reader.readAsDataURL(file);
            }
            
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
            
            // Form submission with SweetAlert
            document.getElementById('productForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menyimpan produk ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#007bff',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="bi bi-check-circle"></i> Ya, Simpan',
                    cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-secondary'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show loading
                        Swal.fire({
                            title: 'Menyimpan...',
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
            document.getElementById('image-preview').innerHTML = `
                <div class="upload-placeholder">
                    <i class="bi bi-cloud-upload display-1 text-muted mb-3"></i>
                    <h5 class="text-muted mb-2">Upload Gambar Produk</h5>
                    <p class="text-muted mb-3">Klik untuk memilih gambar<br>atau drag & drop disini</p>
                    <button type="button" class="btn btn-outline-primary rounded-pill" onclick="document.getElementById('image').click()">
                        <i class="bi bi-folder2-open me-2"></i>Pilih File
                    </button>
                    <div class="mt-3">
                        <small class="text-muted">Format: JPG, PNG, GIF | Max: 2MB</small>
                    </div>
                </div>
            `;
        }
    </script>
@endsection
    
    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Produk</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Kode Produk <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('code') is-invalid @enderror" 
                                                   id="code" name="code" value="{{ old('code') }}" required>
                                            @error('code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">Kode unik untuk produk (contoh: AK001, PH002)</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                                            <select class="form-select @error('category') is-invalid @enderror" 
                                                    id="category" name="category" required>
                                                <option value="">Pilih Kategori</option>
                                                <option value="arang_kelapa" {{ old('category') == 'arang_kelapa' ? 'selected' : '' }}>Arang Kelapa</option>
                                                <option value="produk_hexa" {{ old('category') == 'produk_hexa' ? 'selected' : '' }}>Produk Hexa</option>
                                                <option value="bahan_baku" {{ old('category') == 'bahan_baku' ? 'selected' : '' }}>Bahan Baku</option>
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="unit" class="form-label">Satuan <span class="text-danger">*</span></label>
                                            <select class="form-select @error('unit') is-invalid @enderror" 
                                                    id="unit" name="unit" required>
                                                <option value="">Pilih Satuan</option>
                                                <option value="ton" {{ old('unit') == 'ton' ? 'selected' : '' }}>Ton</option>
                                                <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>Kilogram</option>
                                                <option value="pcs" {{ old('unit') == 'pcs' ? 'selected' : '' }}>Pieces</option>
                                                <option value="karung" {{ old('unit') == 'karung' ? 'selected' : '' }}>Karung</option>
                                            </select>
                                            @error('unit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="weight_per_unit" class="form-label">Berat per Unit (kg)</label>
                                            <input type="number" step="0.01" class="form-control @error('weight_per_unit') is-invalid @enderror" 
                                                   id="weight_per_unit" name="weight_per_unit" value="{{ old('weight_per_unit') }}">
                                            @error('weight_per_unit')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                                       id="price" name="price" value="{{ old('price') }}" required>
                                            </div>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="stock_quantity" class="form-label">Stok Awal <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" 
                                                   id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" required>
                                            @error('stock_quantity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="minimum_stock" class="form-label">Stok Minimum <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control @error('minimum_stock') is-invalid @enderror" 
                                                   id="minimum_stock" name="minimum_stock" value="{{ old('minimum_stock', 0) }}" required>
                                            @error('minimum_stock')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                            <select class="form-select @error('status') is-invalid @enderror" 
                                                    id="status" name="status" required>
                                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Aktif</option>
                                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Gambar Produk</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                   id="image" name="image" accept="image/*">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Specifications Card -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h3 class="card-title">Spesifikasi Teknis</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="add-specification">
                                        <i class="bi bi-plus"></i> Tambah Spesifikasi
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="specifications-container">
                                    <div class="row specification-row">
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="specifications[0][key]" placeholder="Nama spesifikasi (contoh: Kadar Air)">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="specifications[0][value]" placeholder="Nilai (contoh: < 10%)">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-outline-danger remove-specification">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text mt-2">
                                    Tambahkan spesifikasi teknis produk seperti kadar air, ukuran, dll.
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                    <div>
                                        <button type="reset" class="btn btn-outline-warning me-2">
                                            <i class="bi bi-arrow-clockwise"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-circle"></i> Simpan Produk
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let specificationIndex = 1;

            // Add specification
            document.getElementById('add-specification').addEventListener('click', function() {
                const container = document.getElementById('specifications-container');
                const newRow = document.createElement('div');
                newRow.className = 'row specification-row mt-2';
                newRow.innerHTML = `
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="specifications[${specificationIndex}][key]" placeholder="Nama spesifikasi">
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="specifications[${specificationIndex}][value]" placeholder="Nilai">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-outline-danger remove-specification">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                `;
                container.appendChild(newRow);
                specificationIndex++;
            });

            // Remove specification
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-specification')) {
                    const row = e.target.closest('.specification-row');
                    if (document.querySelectorAll('.specification-row').length > 1) {
                        row.remove();
                    } else {
                        // Clear inputs instead of removing if it's the last row
                        row.querySelectorAll('input').forEach(input => input.value = '');
                    }
                }
            });

            // Auto-generate code based on category and name
            document.getElementById('category').addEventListener('change', generateCode);
            document.getElementById('name').addEventListener('input', generateCode);

            function generateCode() {
                const category = document.getElementById('category').value;
                const name = document.getElementById('name').value;
                const codeInput = document.getElementById('code');
                
                if (category && name && !codeInput.value) {
                    let prefix = '';
                    switch(category) {
                        case 'arang_kelapa': prefix = 'AK'; break;
                        case 'produk_hexa': prefix = 'PH'; break;
                        case 'bahan_baku': prefix = 'BB'; break;
                    }
                    
                    const nameCode = name.substring(0, 3).toUpperCase().replace(/[^A-Z]/g, '');
                    const randomNum = Math.floor(Math.random() * 100).toString().padStart(2, '0');
                    codeInput.value = prefix + nameCode + randomNum;
                }
            }

            // Image preview
            document.getElementById('image').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Create or update image preview
                        let preview = document.getElementById('image-preview');
                        if (!preview) {
                            preview = document.createElement('img');
                            preview.id = 'image-preview';
                            preview.className = 'mt-2 rounded';
                            preview.style.maxWidth = '200px';
                            preview.style.maxHeight = '200px';
                            document.getElementById('image').parentNode.appendChild(preview);
                        }
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection