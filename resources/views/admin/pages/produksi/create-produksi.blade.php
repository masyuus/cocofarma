@extends('admin.layouts.app')

@section('title', 'Buat Produksi')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Rencana Produksi</h1>
    <a href="{{ route('backoffice.produksi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="{{ route('backoffice.produksi.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Produk</label>
                    <select name="produk_id" class="form-select">
                        @foreach($produks as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->nama_produk ?? $produk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Produksi</label>
                    <input type="date" name="tanggal_produksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Target</label>
                    <input type="number" name="jumlah_target" class="form-control" min="1" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
