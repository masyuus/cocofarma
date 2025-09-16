@extends('admin.layouts.app')

@section('title', 'Bahan Baku')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Bahan Baku</h1>
    <a href="{{ route('backoffice.bahanbaku.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Bahan Baku
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan Baku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Harga per Satuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bahanBakus ?? [] as $index => $bahanBaku)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $bahanBaku->nama ?? '-' }}</td>
                            <td>{{ $bahanBaku->satuan ?? '-' }}</td>
                            <td>{{ $bahanBaku->stok ?? 0 }}</td>
                            <td>Rp {{ number_format($bahanBaku->harga_per_satuan ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-{{ $bahanBaku->status == 'aktif' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($bahanBaku->status ?? 'aktif') }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backoffice.bahanbaku.show', $bahanBaku->id ?? '#') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('backoffice.bahanbaku.edit', $bahanBaku->id ?? '#') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('backoffice.bahanbaku.destroy', $bahanBaku->id ?? '#') }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center">Tidak ada data bahan baku</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection