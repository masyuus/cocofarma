@extends('admin.layouts.app')

@section('title', 'Pesanan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
    <a href="{{ route('backoffice.pesanan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pesanan
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal Pesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanans ?? [] as $index => $pesanan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pesanan->kode_pesanan ?? '-' }}</td>
                            <td>{{ $pesanan->nama_pelanggan ?? '-' }}</td>
                            <td>Rp {{ number_format($pesanan->total ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-{{ $pesanan->status == 'selesai' ? 'success' : ($pesanan->status == 'proses' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($pesanan->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>{{ $pesanan->tanggal_pesanan ? \Carbon\Carbon::parse($pesanan->tanggal_pesanan)->format('d/m/Y') : '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backoffice.pesanan.show', $pesanan->id ?? '#') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('backoffice.pesanan.edit', $pesanan->id ?? '#') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('backoffice.pesanan.destroy', $pesanan->id ?? '#') }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center">Tidak ada data pesanan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection