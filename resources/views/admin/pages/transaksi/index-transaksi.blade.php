@extends('admin.layouts.app')

@section('title', 'Transaksi')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
    <a href="{{ route('backoffice.transaksi.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Transaksi
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksis ?? [] as $index => $transaksi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $transaksi->kode_transaksi ?? '-' }}</td>
                            <td>{{ $transaksi->nama_pelanggan ?? '-' }}</td>
                            <td>Rp {{ number_format($transaksi->total ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-{{ $transaksi->status == 'selesai' ? 'success' : ($transaksi->status == 'proses' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($transaksi->status ?? 'pending') }}
                                </span>
                            </td>
                            <td>{{ $transaksi->tanggal_transaksi ? \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d/m/Y') : '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backoffice.transaksi.show', $transaksi->id ?? '#') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('backoffice.transaksi.edit', $transaksi->id ?? '#') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('backoffice.transaksi.destroy', $transaksi->id ?? '#') }}" method="POST" class="d-inline">
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
                            <td colspan="7" class="text-center">Tidak ada data transaksi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection