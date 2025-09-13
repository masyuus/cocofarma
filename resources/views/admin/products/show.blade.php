@extends('layouts.admin')

@section('content')
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Detail Produk</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <!-- Product Information -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Produk</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <!-- Basic Info -->
                            <div class="row mb-4">
                                <div class="col-sm-3"><strong>Nama Produk:</strong></div>
                                <div class="col-sm-9">{{ $product->name }}</div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-3"><strong>Kode Produk:</strong></div>
                                <div class="col-sm-9">
                                    <span class="badge badge-lg text-bg-secondary">{{ $product->code }}</span>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-3"><strong>Kategori:</strong></div>
                                <div class="col-sm-9">
                                    <span class="badge badge-lg text-bg-info">{{ $product->category_label }}</span>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-3"><strong>Status:</strong></div>
                                <div class="col-sm-9">
                                    <span class="badge badge-lg text-bg-{{ $product->status === 'active' ? 'success' : 'warning' }}">
                                        {{ $product->status_label }}
                                    </span>
                                </div>
                            </div>
                            
                            @if($product->description)
                                <div class="row mb-4">
                                    <div class="col-sm-3"><strong>Deskripsi:</strong></div>
                                    <div class="col-sm-9">{{ $product->description }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Pricing & Stock Information -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Harga & Stok</h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon text-bg-success">
                                            <i class="bi bi-currency-exchange"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Harga</span>
                                            <span class="info-box-number">{{ $product->formatted_price }}</span>
                                            <span class="info-box-more">per {{ $product->unit }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon text-bg-{{ $product->is_low_stock ? 'danger' : 'primary' }}">
                                            <i class="bi bi-boxes"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Stok Tersedia</span>
                                            <span class="info-box-number">{{ number_format($product->stock_quantity) }} {{ $product->unit }}</span>
                                            @if($product->is_low_stock)
                                                <span class="info-box-more text-danger">
                                                    <i class="bi bi-exclamation-triangle"></i> Stok Rendah
                                                </span>
                                            @else
                                                <span class="info-box-more text-success">Stok Normal</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="border rounded p-3 text-center">
                                        <strong>Satuan</strong>
                                        <div class="mt-2">{{ $product->unit }}</div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="border rounded p-3 text-center">
                                        <strong>Stok Minimum</strong>
                                        <div class="mt-2">{{ number_format($product->minimum_stock) }} {{ $product->unit }}</div>
                                    </div>
                                </div>
                                
                                @if($product->weight_per_unit)
                                    <div class="col-md-4">
                                        <div class="border rounded p-3 text-center">
                                            <strong>Berat per Satuan</strong>
                                            <div class="mt-2">{{ number_format($product->weight_per_unit, 2) }} kg</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Specifications -->
                    @if($product->specifications && count($product->specifications) > 0)
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Spesifikasi</h3>
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            @foreach($product->specifications as $key => $value)
                                                <tr>
                                                    <th class="bg-light" style="width: 30%">
                                                        {{ is_array($value) && isset($value['key']) ? $value['key'] : $key }}
                                                    </th>
                                                    <td>{{ is_array($value) && isset($value['value']) ? $value['value'] : $value }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Product Image & Actions -->
                <div class="col-md-4">
                    <!-- Product Image -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gambar Produk</h3>
                        </div>
                        
                        <div class="card-body text-center">
                            @if($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="img-fluid rounded border mb-3"
                                     style="max-height: 300px;">
                            @else
                                <div class="bg-light rounded border d-flex align-items-center justify-content-center mb-3" 
                                     style="height: 200px;">
                                    <div class="text-center">
                                        <i class="bi bi-image display-4 text-muted"></i>
                                        <p class="text-muted mt-2">Tidak ada gambar</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Aksi Cepat</h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit Produk
                                </a>
                                
                                <button type="button" class="btn btn-{{ $product->status === 'active' ? 'secondary' : 'success' }} status-toggle" 
                                        data-product-id="{{ $product->id }}">
                                    <i class="bi bi-toggle-{{ $product->status === 'active' ? 'off' : 'on' }}"></i>
                                    {{ $product->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                                </button>
                                
                                <button type="button" class="btn btn-danger delete-btn" 
                                        data-product-id="{{ $product->id }}"
                                        data-product-name="{{ $product->name }}">
                                    <i class="bi bi-trash"></i> Hapus Produk
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Stats -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Tambahan</h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-6"><strong>Dibuat:</strong></div>
                                <div class="col-6">{{ $product->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-6"><strong>Diupdate:</strong></div>
                                <div class="col-6">{{ $product->updated_at->format('d/m/Y H:i') }}</div>
                            </div>
                            
                            @if($product->weight_per_unit)
                                <div class="row mb-2">
                                    <div class="col-6"><strong>Total Berat:</strong></div>
                                    <div class="col-6">{{ number_format($product->stock_quantity * $product->weight_per_unit, 2) }} kg</div>
                                </div>
                            @endif
                            
                            <div class="row">
                                <div class="col-6"><strong>Total Nilai:</strong></div>
                                <div class="col-6">Rp {{ number_format($product->stock_quantity * $product->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus produk <strong id="product-name"></strong>?</p>
                    <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="delete-form" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Status toggle with enhanced SweetAlert
            document.querySelectorAll('.status-toggle').forEach(function(button) {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    const currentStatus = this.textContent.includes('Nonaktifkan') ? 'active' : 'inactive';
                    const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
                    const statusText = newStatus === 'active' ? 'mengaktifkan' : 'menonaktifkan';
                    
                    Swal.fire({
                        title: 'Konfirmasi Perubahan Status',
                        text: `Apakah Anda yakin ingin ${statusText} produk ini?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: newStatus === 'active' ? '#28a745' : '#6c757d',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: `<i class="bi bi-toggle-${newStatus === 'active' ? 'on' : 'off'}"></i> Ya, ${statusText.charAt(0).toUpperCase() + statusText.slice(1)}`,
                        cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                        customClass: {
                            confirmButton: `btn btn-${newStatus === 'active' ? 'success' : 'secondary'}`,
                            cancelButton: 'btn btn-outline-secondary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Memproses...',
                                text: 'Mohon tunggu sebentar',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                            
                            fetch(`/admin/products/${productId}/toggle-status`, {
                                method: 'PATCH',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'Content-Type': 'application/json',
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: data.message,
                                        timer: 2000,
                                        showConfirmButton: false
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    throw new Error(data.message || 'Terjadi kesalahan');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat mengubah status produk.',
                                    confirmButtonText: 'OK'
                                });
                            });
                        }
                    });
                });
            });

            // Enhanced delete confirmation
            document.querySelectorAll('.delete-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    const productName = this.dataset.productName;
                    
                    Swal.fire({
                        title: 'Hapus Produk?',
                        html: `
                            <div class="text-center mb-3">
                                <i class="bi bi-exclamation-triangle-fill text-warning display-1"></i>
                            </div>
                            <p>Apakah Anda yakin ingin menghapus produk:</p>
                            <p class="fw-bold text-primary">${productName}</p>
                            <div class="alert alert-danger mt-3" role="alert">
                                <small><i class="bi bi-info-circle"></i> Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait produk ini.</small>
                            </div>
                        `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<i class="bi bi-trash"></i> Ya, Hapus Produk',
                        cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                        customClass: {
                            confirmButton: 'btn btn-danger',
                            cancelButton: 'btn btn-secondary'
                        },
                        buttonsStyling: false,
                        focusCancel: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Menghapus Produk...',
                                text: 'Mohon tunggu, produk sedang dihapus',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                            
                            // Create and submit form
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/admin/products/${productId}`;
                            
                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            
                            const methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'DELETE';
                            
                            form.appendChild(csrfToken);
                            form.appendChild(methodField);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });

            // Add some interactive enhancements
            document.querySelectorAll('.info-box').forEach(function(box) {
                box.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                box.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
            
            // Add tooltip for copy product code functionality
            const productCode = document.querySelector('.badge.badge-lg.text-bg-secondary');
            if (productCode) {
                productCode.style.cursor = 'pointer';
                productCode.title = 'Klik untuk menyalin kode produk';
                
                productCode.addEventListener('click', function() {
                    const code = this.textContent;
                    navigator.clipboard.writeText(code).then(() => {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: 'Kode produk berhasil disalin!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        });
                    }).catch(() => {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Gagal menyalin kode produk',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    });
                });
            }
        });
    </script>
@endsection