@extends('admin.layouts.app')

@section('title', 'Master Bahan Baku')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Data Bahan Baku</h1>
        <a href="{{ route('backoffice.master-bahan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Bahan Baku
        </a>
    </div>

    <!-- Success/Error Messages -->
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

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan Baku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Bahan Baku</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample data - replace with actual data from database -->
                        <tr>
                            <td>1</td>
                            <td>Kelapa Parut</td>
                            <td>100</td>
                            <td>Kg</td>
                            <td>Rp 15,000</td>
                            <td>
                                <a href="{{ route('backoffice.master-bahan.show', 1) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('backoffice.master-bahan.edit', 1) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('backoffice.master-bahan.destroy', 1) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus bahan baku ini?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- Add more sample rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection