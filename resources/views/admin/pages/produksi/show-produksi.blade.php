@extends('admin.layouts.app')

@section('title', 'Detail Produksi')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Produksi</h1>
    <a href="{{ route('backoffice.produksi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <h5>Nomor Produksi: {{ $produksi->nomor_produksi ?? '-' }}</h5>
            <p>Produk: {{ $produksi->produk->nama_produk ?? ($produksi->produk->nama ?? '-') }}</p>
            <p>Tanggal: {{ $produksi->tanggal_produksi }}</p>
            <p>Target: {{ $produksi->jumlah_target }}</p>
            <p>Hasil: {{ $produksi->jumlah_hasil }}</p>
            <p>Status: {{ $produksi->status }}</p>
            <p>Catatan: {{ $produksi->catatan }}</p>
        </div>
    </div>
</div>
@endsection
