@extends('admin.layouts.app')

@section('title', 'Edit Master Bahan Baku')

@section('content')
<style>
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --info: #4895ef;
        --warning: #f72585;
        --danger: #e63946;
        --light: #f8f9fa;
        --dark: #212529;
        --gray: #6c757d;
        --light-gray: #e9ecef;
        --border-radius: 8px;
        --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 32px;
    }

    h1 {
        color: var(--dark);
        font-size: 1.8rem;
        font-weight: 600;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--dark);
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        font-size: 0.95rem;
        transition: var(--transition);
        background: white;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }

    .form-group textarea {
        min-height: 120px;
        resize: vertical;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-weight: 500;
        transition: var(--transition);
        font-size: 0.95rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: var(--secondary);
        transform: translateY(-1px);
    }

    .btn-secondary {
        background: var(--gray);
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid var(--light-gray);
    }

    .error-message {
        color: var(--danger);
        font-size: 0.85rem;
        margin-top: 4px;
    }
</style>

<div class="container">
    <h1><i class="fas fa-edit"></i> Edit Master Bahan Baku</h1>

    <form action="{{ route('backoffice.master-bahan.update', $bahanBaku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="kode_bahan">Kode Bahan *</label>
                <input type="text" id="kode_bahan" name="kode_bahan" value="{{ old('kode_bahan', $bahanBaku->kode_bahan) }}" required>
                @error('kode_bahan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_bahan">Nama Bahan *</label>
                <input type="text" id="nama_bahan" name="nama_bahan" value="{{ old('nama_bahan', $bahanBaku->nama_bahan) }}" required>
                @error('nama_bahan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori">
                    <option value="">Pilih Kategori</option>
                    <option value="Oprasional" {{ old('kategori', $bahanBaku->kategori) == 'Oprasional' ? 'selected' : '' }}>Oprasional</option>
                    <option value="Master" {{ old('kategori', $bahanBaku->kategori) == 'Master' ? 'selected' : '' }}>Master</option>
                </select>
                @error('kategori')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="satuan">Satuan *</label>
                <select id="satuan" name="satuan" required>
                    <option value="">Pilih Satuan</option>
                    <option value="kg" {{ old('satuan', $bahanBaku->satuan) == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                    <option value="liter" {{ old('satuan', $bahanBaku->satuan) == 'liter' ? 'selected' : '' }}>Liter</option>
                    <option value="pcs" {{ old('satuan', $bahanBaku->satuan) == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                    <option value="box" {{ old('satuan', $bahanBaku->satuan) == 'box' ? 'selected' : '' }}>Box</option>
                    <option value="pack" {{ old('satuan', $bahanBaku->satuan) == 'pack' ? 'selected' : '' }}>Pack</option>
                </select>
                @error('satuan')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok', $bahanBaku->stok) }}" min="0">
                @error('stok')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="minimum_stok">Stok Minimum</label>
                <input type="number" id="minimum_stok" name="minimum_stok" value="{{ old('minimum_stok', $bahanBaku->minimum_stok) }}" min="0" step="0.01">
                @error('minimum_stok')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="1" {{ old('status', $bahanBaku->status) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $bahanBaku->status) == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $bahanBaku->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('backoffice.master-bahan.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection