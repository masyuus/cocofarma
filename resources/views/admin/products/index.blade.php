@extends('layouts.admin')

@section('content')
    <!-- App Content Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Manajemen Produk</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- App Content -->
    <div class="app-content">
        <div class="container-fluid">
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $stats['total'] }}</h3>
                            <p>Total Produk</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z"></path>
                            <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $stats['active'] }}</h3>
                            <p>Produk Aktif</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $stats['inactive'] }}</h3>
                            <p>Produk Tidak Aktif</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{ $stats['low_stock'] }}</h3>
                            <p>Stok Rendah</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Produk</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Tambah Produk
                                </a>
                            </div>
                        </div>
                        
                        <!-- Filters -->
                        <div class="card-body border-bottom">
                            <form method="GET" action="{{ route('admin.products.index') }}" class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Cari Produk</label>
                                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Nama atau kode produk...">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Kategori</label>
                                    <select class="form-select" name="category">
                                        <option value="">Semua Kategori</option>
                                        <option value="arang_kelapa" {{ request('category') == 'arang_kelapa' ? 'selected' : '' }}>Arang Kelapa</option>
                                        <option value="produk_hexa" {{ request('category') == 'produk_hexa' ? 'selected' : '' }}>Produk Hexa</option>
                                        <option value="bahan_baku" {{ request('category') == 'bahan_baku' ? 'selected' : '' }}>Bahan Baku</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Semua Status</option>
                                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Stok Rendah</label>
                                    <select class="form-select" name="low_stock">
                                        <option value="">Semua</option>
                                        <option value="1" {{ request('low_stock') == '1' ? 'selected' : '' }}>Ya</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">&nbsp;</label>
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-outline-primary">
                                            <i class="bi bi-search"></i> Filter
                                        </button>
                                        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-clockwise"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Kode</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($products as $product)
                                            <tr>
                                                <td>
                                                    @if($product->image)
                                                        <img src="{{ asset('storage/products/' . $product->image) }}" 
                                                             alt="{{ $product->name }}" 
                                                             class="rounded" 
                                                             style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                             style="width: 50px; height: 50px;">
                                                            <i class="bi bi-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="fw-bold">{{ $product->code }}</span>
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong>{{ $product->name }}</strong>
                                                        @if($product->description)
                                                            <br><small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge text-bg-info">{{ $product->category_label }}</span>
                                                </td>
                                                <td>
                                                    <strong>{{ $product->formatted_price }}</strong>
                                                    <br><small class="text-muted">per {{ $product->unit }}</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="fw-bold {{ $product->is_low_stock ? 'text-danger' : '' }}">
                                                            {{ number_format($product->stock_quantity) }} {{ $product->unit }}
                                                        </span>
                                                        @if($product->is_low_stock)
                                                            <i class="bi bi-exclamation-triangle-fill text-danger ms-1" title="Stok Rendah"></i>
                                                        @endif
                                                    </div>
                                                    <small class="text-muted">Min: {{ number_format($product->minimum_stock) }}</small>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input status-toggle" 
                                                               type="checkbox" 
                                                               data-product-id="{{ $product->id }}"
                                                               {{ $product->status === 'active' ? 'checked' : '' }}>
                                                        <label class="form-check-label">
                                                            <span class="status-text">{{ $product->status_label }}</span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.products.show', $product) }}" 
                                                           class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.products.edit', $product) }}" 
                                                           class="btn btn-sm btn-outline-warning" title="Edit">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <button type="button" 
                                                                class="btn btn-sm btn-outline-danger delete-btn" 
                                                                data-product-id="{{ $product->id }}"
                                                                data-product-name="{{ $product->name }}"
                                                                title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-4">
                                                    <div class="text-muted">
                                                        <i class="bi bi-inbox display-4"></i>
                                                        <p class="mt-2">Tidak ada produk yang ditemukan</p>
                                                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                                            <i class="bi bi-plus-circle"></i> Tambah Produk Pertama
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if($products->hasPages())
                            <div class="card-footer">
                                {{ $products->withQueryString()->links() }}
                            </div>
                        @endif
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
            // Status toggle with enhanced confirmation
            document.querySelectorAll('.status-toggle').forEach(function(toggle) {
                toggle.addEventListener('change', function() {
                    const productId = this.dataset.productId;
                    const statusText = this.closest('td').querySelector('.status-text');
                    const currentStatus = this.checked ? 'active' : 'inactive';
                    const actionText = currentStatus === 'active' ? 'mengaktifkan' : 'menonaktifkan';
                    
                    // Prevent default toggle while showing confirmation
                    this.checked = !this.checked;
                    
                    Swal.fire({
                        title: 'Konfirmasi Perubahan Status',
                        text: `Apakah Anda yakin ingin ${actionText} produk ini?`,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: currentStatus === 'active' ? '#28a745' : '#6c757d',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: `<i class="bi bi-check-circle"></i> Ya, ${actionText.charAt(0).toUpperCase() + actionText.slice(1)}`,
                        cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                        customClass: {
                            confirmButton: `btn btn-${currentStatus === 'active' ? 'success' : 'secondary'}`,
                            cancelButton: 'btn btn-outline-secondary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Show loading
                            Swal.fire({
                                title: 'Memproses...',
                                text: 'Mengubah status produk',
                                allowOutsideClick: false,
                                allowEscapeKey: false,
                                showConfirmButton: false,
                                willOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                            
                            // Apply the toggle
                            this.checked = !this.checked;
                            
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
                                    statusText.textContent = data.status === 'active' ? 'Aktif' : 'Tidak Aktif';
                                    
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: data.message,
                                        timer: 2000,
                                        showConfirmButton: false,
                                        toast: true,
                                        position: 'top-end',
                                        timerProgressBar: true
                                    });
                                } else {
                                    throw new Error(data.message || 'Terjadi kesalahan');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                this.checked = !this.checked; // Revert toggle
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Terjadi kesalahan saat mengubah status.',
                                    confirmButtonText: 'OK'
                                });
                            });
                        }
                        // If cancelled, the toggle remains in original state
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
                                <small><i class="bi bi-info-circle"></i> Tindakan ini tidak dapat dibatalkan!</small>
                            </div>
                        `,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<i class="bi bi-trash"></i> Ya, Hapus',
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
                                title: 'Menghapus...',
                                text: 'Mohon tunggu sebentar',
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

            // Add hover effects to statistics cards
            document.querySelectorAll('.small-box').forEach(function(box) {
                box.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                    this.style.boxShadow = '0 8px 15px rgba(0,0,0,0.1)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                box.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });

            // Add loading animation to filter form
            document.querySelector('form').addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Memuat...';
                submitBtn.disabled = true;
                
                // Re-enable after a short delay in case of fast response
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            });
        });
    </script>
@endsection