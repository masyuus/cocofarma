@extends('admin.layouts.app')

@section('title', 'Detail Master Bahan Baku')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Master Bahan Baku</h1>
        <div>
            <a href="{{ route('backoffice.master-bahan.edit', $id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('backoffice.master-bahan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Bahan Baku</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">ID Bahan Baku:</label>
                                <p class="form-control-plaintext">{{ $id }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Bahan Baku:</label>
                                <p class="form-control-plaintext">Kelapa Parut</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Satuan:</label>
                                <p class="form-control-plaintext">Kg</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Harga per Satuan:</label>
                                <p class="form-control-plaintext">Rp 15,000</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Stok Minimum:</label>
                                <p class="form-control-plaintext">10</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Stok Saat Ini:</label>
                                <p class="form-control-plaintext">100</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Deskripsi:</label>
                        <p class="form-control-plaintext">Bahan baku utama untuk produksi berbagai produk olahan kelapa</p>
                    </div>

                    <div class="form-group mb-3">
                        <label class="font-weight-bold">Tanggal Dibuat:</label>
                        <p class="form-control-plaintext">{{ now()->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection