@extends('admin.layouts.app')

@section('title', 'Show Pengaturan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaturan</h1>
        <a href="{{ route('backoffice.pengaturan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p>Detail pengaturan dengan ID: {{ $id }}</p>
            <!-- TODO: Implement pengaturan detail view -->
        </div>
    </div>
</div>
@endsection