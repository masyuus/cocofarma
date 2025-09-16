@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
        <a href="{{ route('backoffice.master-produk.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('backoffice.master-produk.update', $id) }}" method="POST">
                @csrf
                @method('PUT')
                <p>Form edit produk dengan ID: {{ $id }}</p>
                <!-- TODO: Implement produk edit form -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection