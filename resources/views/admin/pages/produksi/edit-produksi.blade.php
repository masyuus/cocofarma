@extends('admin.layouts.app')

@section('title', 'Edit Produksi')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Produksi</h1>
    <a href="{{ route('backoffice.produksi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="{{ route('backoffice.produksi.update', $produksi->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="rencana" {{ $produksi->status == 'rencana' ? 'selected' : '' }}>Rencana</option>
                        <option value="proses" {{ $produksi->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $produksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="gagal" {{ $produksi->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Hasil (jika selesai)</label>
                    <input type="number" name="jumlah_hasil" class="form-control" value="{{ $produksi->jumlah_hasil }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control">{{ $produksi->catatan }}</textarea>
                </div>
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
