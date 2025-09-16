@extends('admin.layouts.app')

@section('title', 'Laporan')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
    </div>

    <!-- Cards Grid -->
    <div class="row">
        <!-- Laporan Produksi -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Laporan Produksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Produksi</div>
                            <p class="mb-0 text-gray-600">Lihat data produksi harian, mingguan, dan bulanan</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('backoffice.laporan.produksi') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i> Lihat Laporan
                        </a>
                        <a href="{{ route('backoffice.laporan.export-pdf', 'produksi') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                        <a href="{{ route('backoffice.laporan.export-excel', 'produksi') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel"></i> Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Stok -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Laporan Stok</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Stok</div>
                            <p class="mb-0 text-gray-600">Monitor stok bahan baku dan produk jadi</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('backoffice.laporan.stok') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-eye"></i> Lihat Laporan
                        </a>
                        <a href="{{ route('backoffice.laporan.export-pdf', 'stok') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                        <a href="{{ route('backoffice.laporan.export-excel', 'stok') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel"></i> Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Penjualan -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Laporan Penjualan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Penjualan</div>
                            <p class="mb-0 text-gray-600">Analisis penjualan dan revenue harian</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('backoffice.laporan.penjualan') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Lihat Laporan
                        </a>
                        <a href="{{ route('backoffice.laporan.export-pdf', 'penjualan') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-file-pdf"></i> PDF
                        </a>
                        <a href="{{ route('backoffice.laporan.export-excel', 'penjualan') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-file-excel"></i> Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Ringkasan -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Laporan Ringkasan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Dashboard Bisnis</div>
                            <p class="mb-0 text-gray-600">Ringkasan performa bisnis secara keseluruhan</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-pie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('backoffice.dashboard') }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-tachometer-alt"></i> Lihat Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection