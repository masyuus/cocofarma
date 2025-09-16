@extends('admin.layouts.app')

@section('title', 'Produksi')

@section('content')
<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Produksi</h1>
    <a href="{{ route('backoffice.produksi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Buat Rencana Produksi
        </a>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filters -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="rencana" {{ request('status') == 'rencana' ? 'selected' : '' }}>Rencana</option>
                        <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="gagal" {{ request('status') == 'gagal' ? 'selected' : '' }}>Gagal</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tanggal_dari" class="form-label">Tanggal Dari</label>
                    <input type="date" name="tanggal_dari" id="tanggal_dari" class="form-control" value="{{ request('tanggal_dari') }}">
                </div>
                <div class="col-md-3">
                    <label for="tanggal_sampai" class="form-label">Tanggal Sampai</label>
                    <input type="date" name="tanggal_sampai" id="tanggal_sampai" class="form-control" value="{{ request('tanggal_sampai') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Produksi</h6>
        </div>
        <div class="card-body">
            @if($produksi->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nomor Produksi</th>
                                <th>Produk</th>
                                <th>Tanggal Produksi</th>
                                <th>Target</th>
                                <th>Hasil</th>
                                <th>Status</th>
                                <th>Biaya</th>
                                <th>PIC</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produksi as $key => $item)
                                <tr>
                                    <td>{{ $produksi->firstItem() + $key }}</td>
                                    <td>
                                        <strong>{{ $item->nomor_produksi }}</strong>
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $item->produk->nama_produk }}</div>
                                        <small class="text-muted">{{ $item->produk->kode_produk }}</small>
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($item->tanggal_produksi)) }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ number_format($item->jumlah_target) }} {{ $item->produk->satuan }}</span>
                                    </td>
                                    <td>
                                        @if($item->status === 'selesai')
                                            <span class="badge bg-success">{{ number_format($item->jumlah_hasil) }} {{ $item->produk->satuan }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @switch($item->status)
                                            @case('rencana')
                                                <span class="badge bg-secondary">Rencana</span>
                                                @break
                                            @case('proses')
                                                <span class="badge bg-warning">Proses</span>
                                                @break
                                            @case('selesai')
                                                <span class="badge bg-success">Selesai</span>
                                                @break
                                            @case('gagal')
                                                <span class="badge bg-danger">Gagal</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>Rp {{ number_format($item->biaya_produksi, 0, ',', '.') }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('backoffice.produksi.show', $item) }}" class="btn btn-info btn-sm" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(in_array($item->status, ['rencana', 'proses']))
                                                <a href="{{ route('backoffice.produksi.edit', $item) }}" class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                            @if($item->status === 'rencana')
                                                    <form action="{{ route('backoffice.produksi.destroy', $item) }}" method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Yakin ingin menghapus data produksi ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted">
                        Menampilkan {{ $produksi->firstItem() }} - {{ $produksi->lastItem() }} dari {{ $produksi->total() }} data
                    </div>
                    {{ $produksi->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <img src="{{ asset('admin/img/empty-state.svg') }}" alt="No data" style="max-width: 200px;" class="mb-3">
                    <h5 class="text-muted">Belum ada data produksi</h5>
                    <p class="text-muted">Silakan buat rencana produksi pertama Anda.</p>
                    <a href="{{ route('backoffice.produksi.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Buat Rencana Produksi
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
.table th {
    border-top: none;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
    margin-right: 0.25rem;
}

.btn-group .btn:last-child {
    margin-right: 0;
}

.card {
    border: none;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
}

.card-header {
    border-bottom: 1px solid #e3e6f0;
    background-color: #f8f9fc;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
</script>
@endpush
@endsection