@extends('admin.layouts.app')

@section('title', 'Show User')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail User</h1>
        <a href="{{ route('backoffice.master-user.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <p>Detail user dengan ID: {{ $id }}</p>
            <!-- TODO: Implement user detail view -->
        </div>
    </div>
</div>
@endsection