@extends('admin.layouts.app')

@section('title', 'Show Produk')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Produk</h1>
        <a href="{{ route('backoffice.master-produk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p>Detail produk dengan ID: {{ $id }}</p>
            <!-- TODO: Implement produk detail view -->
        </div>
    </div>
</div>
@endsection