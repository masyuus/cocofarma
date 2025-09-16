@extends('admin.layouts.app')

@section('title', 'Tambah Pesanan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pesanan</h1>
        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pesanan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pesanan">Kode Pesanan</label>
                            <input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="{{ old('kode_pesanan') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="number" class="form-control" id="total" name="total" value="{{ old('total') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal_pesanan">Tanggal Pesanan</label>
                    <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" value="{{ old('tanggal_pesanan') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection