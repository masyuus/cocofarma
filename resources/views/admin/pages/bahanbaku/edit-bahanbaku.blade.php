@extends('admin.layouts.app')

@section('title', 'Edit Bahan Baku - Cocofarma')

@section('content')
<style>
    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --primary-hover: #3a4fd8;
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

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    html, body {
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .container {
        max-width: 800px;
        margin: 40px auto 60px auto;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 30px;
        overflow: hidden;
        min-height: calc(100vh - 200px);
        position: relative;
    }

    /* Content wrapper untuk spacing yang lebih baik */
    .content-wrapper {
        padding: 20px 0;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid var(--light-gray);
    }

    .page-header h1 {
        color: var(--dark);
        font-size: 1.8rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-header h1 i {
        color: var(--primary);
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-weight: 500;
        transition: var(--transition);
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: white;
    }

    .btn-secondary {
        background: var(--gray);
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--dark);
        font-size: 0.95rem;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid var(--light-gray);
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: var(--transition);
        background: white;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        transform: translateY(-1px);
    }

    .form-group textarea:focus {
        transform: translateY(-1px);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--light-gray);
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: var(--primary-hover);
        transform: translateY(-1px);
    }

    .text-danger {
        color: var(--danger) !important;
        font-size: 0.85rem;
        margin-top: 5px;
        font-weight: 500;
    }

    .error-border {
        border-color: var(--danger) !important;
        box-shadow: 0 0 0 3px rgba(230, 57, 70, 0.15) !important;
    }

    /* Enhanced form styling */
    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }

    .form-group input[type="number"] {
        -moz-appearance: textfield;
    }

    .form-group input[type="number"]::-webkit-outer-spin-button,
    .form-group input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Animation effects */
    .container {
        animation: fadeInUp 0.5s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group {
        animation: slideInLeft 0.4s ease-out;
        animation-fill-mode: both;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.15s; }
    .form-group:nth-child(3) { animation-delay: 0.2s; }
    .form-group:nth-child(4) { animation-delay: 0.25s; }
    .form-group:nth-child(5) { animation-delay: 0.3s; }
    .form-group:nth-child(6) { animation-delay: 0.35s; }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @media (max-width: 768px) {
        .container {
            margin: 20px 15px 40px 15px;
            padding: 20px;
            min-height: calc(100vh - 160px);
        }

        .content-wrapper {
            padding: 10px 0;
        }

        .form-row {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .page-header {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .page-header h1 {
            font-size: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
            gap: 10px;
        }

        .btn {
            justify-content: center;
            width: 100%;
            padding: 12px 20px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            font-size: 16px; /* Prevent zoom on iOS */
        }
    }

    .form-group input[readonly] {
        background-color: #f8f9fa !important;
        cursor: not-allowed !important;
        opacity: 0.8;
        border-color: #dee2e6 !important;
    }

    .form-group input[readonly]:focus {
        border-color: #dee2e6 !important;
        box-shadow: none !important;
        outline: none !important;
    }

    .text-muted {
        color: #6c757d;
        font-size: 0.875rem;
        margin-top: 4px;
        display: block;
    }
</style>

<div class="container">
    <div class="content-wrapper">
        <div class="page-header">
            <h1><i class="fas fa-edit"></i> Edit Bahan Baku</h1>
            <a href="{{ route('backoffice.bahanbaku.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <form action="{{ route('backoffice.bahanbaku.update', $bahanBaku->id) }}" method="POST">
            @csrf
            @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="kode_bahan" class="required">Kode Bahan</label>
                <input type="text" id="kode_bahan" name="kode_bahan" value="{{ old('kode_bahan', $bahanBaku->kode_bahan) }}" readonly required style="background-color: #f8f9fa; cursor: not-allowed;">
                <small class="text-muted">Format: BB + YYMMDD + Nama (4 karakter) - Kode bahan tidak dapat diubah</small>
                @error('kode_bahan')
                    <div class="text-danger" data-server-error="true">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_bahan" class="required">Nama Bahan</label>
                <input type="text" id="nama_bahan" name="nama_bahan" value="{{ old('nama_bahan', $bahanBaku->nama_bahan) }}" required>
                @error('nama_bahan')
                    <div class="text-danger" data-server-error="true">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori">
                    <option value="operational" {{ old('kategori', $bahanBaku->kategori) == 'operational' ? 'selected' : '' }}>Operational</option>
                    <option value="master" {{ old('kategori', $bahanBaku->kategori) == 'master' ? 'selected' : '' }}>Master</option>
                </select>
                @error('kategori')
                    <div class="text-danger" data-server-error="true">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="satuan" class="required">Satuan</label>
                <input type="text" id="satuan" name="satuan" value="{{ old('satuan', $bahanBaku->satuan) }}" required>
                @error('satuan')
                    <div class="text-danger" data-server-error="true">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok', $bahanBaku->stok ?? 0) }}" min="0">
                @error('stok')
                    <div class="text-danger" data-server-error="true">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="1" {{ old('status', $bahanBaku->status) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $bahanBaku->status) == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="text-danger" data-server-error="true">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" style="width: 100%; padding: 12px 15px; border: 2px solid var(--light-gray); border-radius: var(--border-radius); font-size: 1rem; transition: var(--transition); background: white; resize: vertical;" placeholder="Deskripsi bahan baku (opsional)">{{ old('deskripsi', $bahanBaku->deskripsi ?? '') }}</textarea>
            @error('deskripsi')
                <div class="text-danger" data-server-error="true">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('backoffice.bahanbaku.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
    </div>
</div>

<script>
// Prevent editing of kode field (readonly)
document.getElementById('kode_bahan').addEventListener('keydown', function(e) {
    e.preventDefault();
    return false;
});

document.getElementById('kode_bahan').addEventListener('paste', function(e) {
    e.preventDefault();
    return false;
});

document.getElementById('kode_bahan').addEventListener('cut', function(e) {
    e.preventDefault();
    return false;
});

document.getElementById('kode_bahan').addEventListener('contextmenu', function(e) {
    e.preventDefault();
    return false;
});

// Form validation and submission with enhanced visual feedback
document.querySelector('form').addEventListener('submit', function(e) {
    const requiredFields = ['nama_bahan', 'satuan'];
    let isValid = true;

    // Reset previous error states
    document.querySelectorAll('.form-group input, .form-group select').forEach(element => {
        element.classList.remove('error-border');
    });
    document.querySelectorAll('.text-danger').forEach(error => {
        if (!error.hasAttribute('data-server-error')) {
            error.remove();
        }
    });

    requiredFields.forEach(field => {
        const element = document.getElementById(field);
        if (!element.value.trim()) {
            element.classList.add('error-border');
            element.style.borderColor = 'var(--danger)';
            element.style.boxShadow = '0 0 0 3px rgba(230, 57, 70, 0.15)';

            // Add error message if not exists
            if (!element.parentNode.querySelector('.text-danger[data-client-error]')) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'text-danger';
                errorDiv.setAttribute('data-client-error', 'true');
                errorDiv.textContent = 'Field ini wajib diisi';
                element.parentNode.appendChild(errorDiv);
            }

            isValid = false;
        } else {
            element.classList.remove('error-border');
            element.style.borderColor = 'var(--light-gray)';
            element.style.boxShadow = '0 0 0 3px rgba(67, 97, 238, 0.15)';

            // Remove client error message
            const clientError = element.parentNode.querySelector('.text-danger[data-client-error]');
            if (clientError) {
                clientError.remove();
            }
        }
    });

    if (!isValid) {
        e.preventDefault();

        // Scroll to first error
        const firstError = document.querySelector('.error-border');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstError.focus();
        }

        // Show alert with animation
        const alertDiv = document.createElement('div');
        alertDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--danger);
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            z-index: 10000;
            animation: slideInRight 0.3s ease-out;
        `;
        alertDiv.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Mohon lengkapi semua field yang wajib diisi!';

        document.body.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.style.animation = 'slideOutRight 0.3s ease-in';
            setTimeout(() => alertDiv.remove(), 300);
        }, 3000);

        return; // Stop execution if validation fails
    }

    // Add loading state if validation passes
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
    submitBtn.style.opacity = '0.7';

    // Re-enable after 3 seconds (in case of slow response)
    setTimeout(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        submitBtn.style.opacity = '1';
    }, 3000);
});

// Add slide animations for alerts
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>
@endsection