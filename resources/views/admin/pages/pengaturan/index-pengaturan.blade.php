@extends('admin.layouts.app')

@section('title', 'Pengaturan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan Sistem</h1>
    <a href="{{ route('backoffice.pengaturan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengaturan
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengaturan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Key</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengaturans ?? [] as $index => $pengaturan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><code>{{ $pengaturan->key ?? '-' }}</code></td>
                            <td>{{ $pengaturan->nama ?? '-' }}</td>
                            <td>{{ $pengaturan->nilai ?? '-' }}</td>
                            <td>{{ $pengaturan->deskripsi ?? '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('backoffice.pengaturan.show', $pengaturan->id ?? '#') }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('backoffice.pengaturan.edit', $pengaturan->id ?? '#') }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('backoffice.pengaturan.destroy', $pengaturan->id ?? '#') }}" method="POST" class="d-inline">
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
                            <td colspan="6" class="text-center">Tidak ada data pengaturan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection