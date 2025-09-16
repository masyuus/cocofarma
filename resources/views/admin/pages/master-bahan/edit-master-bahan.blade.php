@extends('admin.layouts.app')

@section('title', 'Edit Master Bahan Baku')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Master Bahan Baku</h1>
        <a href="{{ route('backoffice.master-bahan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Bahan Baku</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('backoffice.master-bahan.update', $id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_bahan_baku">Nama Bahan Baku *</label>
                                    <input type="text" class="form-control @error('nama_bahan_baku') is-invalid @enderror"
                                           id="nama_bahan_baku" name="nama_bahan_baku"
                                           value="{{ old('nama_bahan_baku', 'Kelapa Parut') }}" required>
                                    @error('nama_bahan_baku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="satuan">Satuan *</label>
                                    <select class="form-control @error('satuan') is-invalid @enderror"
                                            id="satuan" name="satuan" required>
                                        <option value="">Pilih Satuan</option>
                                        <option value="kg" {{ old('satuan', 'kg') == 'kg' ? 'selected' : '' }}>Kg</option>
                                        <option value="liter" {{ old('satuan', 'kg') == 'liter' ? 'selected' : '' }}>Liter</option>
                                        <option value="pcs" {{ old('satuan', 'kg') == 'pcs' ? 'selected' : '' }}>Pcs</option>
                                        <option value="gram" {{ old('satuan', 'kg') == 'gram' ? 'selected' : '' }}>Gram</option>
                                    </select>
                                    @error('satuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="harga">Harga per Satuan (Rp) *</label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                           id="harga" name="harga" value="{{ old('harga', '15000') }}"
                                           min="0" step="0.01" required>
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="stok_minimum">Stok Minimum</label>
                                    <input type="number" class="form-control @error('stok_minimum') is-invalid @enderror"
                                           id="stok_minimum" name="stok_minimum" value="{{ old('stok_minimum', '10') }}"
                                           min="0">
                                    @error('stok_minimum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', 'Bahan baku utama untuk produksi berbagai produk olahan kelapa') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('backoffice.master-bahan.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection