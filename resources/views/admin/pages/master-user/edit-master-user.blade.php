@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <a href="{{ route('backoffice.master-user.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('backoffice.master-user.update', $id) }}" method="POST">
                @csrf
                @method('PUT')
                <p>Form edit user dengan ID: {{ $id }}</p>
                <!-- TODO: Implement user edit form -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection