@extends('admin.layouts.app')

@section('title', 'Edit Pengaturan')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengaturan</h1>
        <a href="{{ route('backoffice.pengaturan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('backoffice.pengaturan.update', $id) }}" method="POST">
                @csrf
                @method('PUT')
                <p>Form edit pengaturan dengan ID: {{ $id }}</p>
                <!-- TODO: Implement pengaturan edit form -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection