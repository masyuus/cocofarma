@extends('admin.layouts.app')

@section('title', 'Manajemen Produksi - Cocofarma')

@section('content')
<style>
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --primary-hover: #3a4fd8;
        --success: #4cc9f0;
        --info: #4895ef;
        --warning: #f72585;
        --danger: #e63946;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
        --light-gray: #e9ecef;
        --border-radius: 8px;
        --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    html, body {
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .container {
        max-width: 1200px;
        margin: 40px auto 60px auto;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 30px;
        overflow: hidden;
        min-height: calc(100vh - 200px);
        position: relative;
        animation: fadeInUp 0.6s ease-out;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid var(--light-gray);
    }

    .page-header h1 {
        color: var(--dark);
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-header h1 i {
        color: var(--primary);
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-weight: 500;
        transition: var(--transition);
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: white;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    .btn-success {
        background: var(--success);
        color: white;
    }

    .btn-success:hover {
        background: #3ab8d6;
        transform: translateY(-1px);
    }

    .btn-info {
        background: var(--info);
        color: white;
    }

    .btn-info:hover {
        background: #3d7dd8;
        transform: translateY(-1px);
    }

    .btn-warning {
        background: var(--warning);
        color: white;
    }

    .btn-warning:hover {
        background: #d61f6f;
        transform: translateY(-1px);
    }

    .btn-danger {
        background: var(--danger);
        color: white;
    }

    .btn-danger:hover {
        background: #d12d3a;
        transform: translateY(-1px);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid var(--light-gray);
    }

    .table th {
        background: var(--light);
        font-weight: 600;
        color: var(--dark);
    }

    .table tbody tr:hover {
        background: var(--light-gray);
    }

    .badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .badge-success {
        background: var(--success);
        color: white;
    }

    .badge-info {
        background: var(--info);
        color: white;
    }

    .badge-warning {
        background: var(--warning);
        color: white;
    }

    .badge-danger {
        background: var(--danger);
        color: white;
    }

    .badge-secondary {
        background: var(--gray);
        color: white;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container">
    <div class="page-header">
        <h1>
            <i class="fas fa-cogs"></i>
            Manajemen Produksi
        </h1>
        <a href="{{ route('backoffice.produksi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Produksi
        </a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No. Produksi</th>
                    <th>Batch</th>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Target</th>
                    <th>Hasil</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produksis as $produksi)
                <tr>
                    <td>{{ $produksi->nomor_produksi }}</td>
                    <td>
                        @if($produksi->batchProduksi)
                            {{ $produksi->batchProduksi->nomor_batch }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $produksi->produk->nama_produk }}</td>
                    <td>{{ $produksi->tanggal_produksi->format('d/m/Y') }}</td>
                    <td>{{ number_format($produksi->jumlah_target, 2) }}</td>
                    <td>{{ $produksi->jumlah_hasil ? number_format($produksi->jumlah_hasil, 2) : '-' }}</td>
                    <td>
                        @if($produksi->grade_kualitas)
                            <span class="badge badge-{{ $produksi->grade_kualitas === 'A' ? 'success' : ($produksi->grade_kualitas === 'B' ? 'warning' : 'danger') }}">
                                {{ $produksi->grade_kualitas }}
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-{{ $produksi->status === 'selesai' ? 'success' : ($produksi->status === 'diproses' ? 'info' : 'secondary') }}">
                            {{ $produksi->status_label }}
                        </span>
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <a href="{{ route('backoffice.produksi.show', $produksi) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if($produksi->status === 'pending')
                            <a href="{{ route('backoffice.produksi.edit', $produksi) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('backoffice.produksi.destroy', $produksi) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produksi ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @elseif($produksi->status === 'diproses')
                            <form action="{{ route('backoffice.produksi.complete', $produksi) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 40px;">
                        <i class="fas fa-inbox fa-3x" style="color: var(--gray); margin-bottom: 10px;"></i>
                        <br>
                        Belum ada data produksi
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($produksis->hasPages())
    <div style="margin-top: 20px; text-align: center;">
        {{ $produksis->links() }}
    </div>
    @endif
</div>
@endsection