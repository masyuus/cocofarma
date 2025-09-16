@extends('admin.layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
        <a href="{{ route('backoffice.laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p>Laporan penjualan</p>
            <!-- TODO: Implement penjualan report view -->
        </div>
    </div>
</div>
@endsection