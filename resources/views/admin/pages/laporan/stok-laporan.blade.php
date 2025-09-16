@extends('admin.layouts.app')

@section('title', 'Laporan Stok')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Stok</h1>
        <a href="{{ route('backoffice.laporan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p>Laporan stok</p>
            <!-- TODO: Implement stok report view -->
        </div>
    </div>
</div>
@endsection