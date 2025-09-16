@extends('admin.layouts.app')

@section('title', 'Edit Bahan Baku')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Bahan Baku</h1>
        <a href="{{ route('backoffice.bahanbaku.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('backoffice.bahanbaku.update', $id) }}" method="POST">
                @csrf
                @method('PUT')
                <p>Form edit bahan baku dengan ID: {{ $id }}</p>
                <!-- TODO: Implement bahan baku edit form -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection