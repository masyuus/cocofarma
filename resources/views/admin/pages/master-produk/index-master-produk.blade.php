@extends('admin.layouts.app')

@section('title', 'Master Produk')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Data Produk</h1>
    <a href="{{ route('backoffice.master-produk.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks ?? [] as $index => $produk)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $produk->nama ?? '-' }}</td>
                            <td>{{ $produk->kategori ?? '-' }}</td>
                            <td>Rp {{ number_format($produk->harga ?? 0, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok ?? 0 }}</td>
                            <td>
                                <span class="badge badge-{{ $produk->status == 'aktif' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($produk->status ?? 'aktif') }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backoffice.master-produk.show', $produk->id ?? '#') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('backoffice.master-produk.edit', $produk->id ?? '#') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('backoffice.master-produk.destroy', $produk->id ?? '#') }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data produk</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection