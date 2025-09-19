@extends('admin.layouts.app')

@section('title', 'Master Bahan Baku - Cocofarma')

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
        max-width: 1100px;
        margin: 0 auto;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 20px;
        overflow: hidden;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--light-gray);
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--light-gray);
    }

    h1 {
        color: var(--dark);
        font-size: 1.6rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .controls {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
        padding: 16px;
        background: var(--light);
        border-radius: var(--border-radius);
    }

    .left-controls {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .right-controls {
        display: flex;
        gap: 10px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 10px 15px 10px 40px;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        font-size: 0.9rem;
        width: 220px;
        transition: var(--transition);
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }

    .search-box i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray);
    }

    .entries-select {
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .entries-select select {
        padding: 8px 12px;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        background: white;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        font-weight: 500;
        transition: var(--transition);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background: var(--secondary);
        transform: translateY(-1px);
    }

    .btn-success {
        background: var(--success);
        color: white;
    }

    .btn-success:hover {
        background: #3aafd9;
        transform: translateY(-1px);
    }

    .btn-danger {
        background: var(--danger);
        color: white;
    }

    .btn-danger:hover {
        background: #c22c38;
        transform: translateY(-1px);
    }

    .btn-action {
        padding: 5px 10px;
        font-size: 0.8rem;
        margin: 0 2px;
    }

    .btn-info {
        background: var(--info);
        color: white;
    }

    .btn-info:hover {
        background: #3a7fd8;
        transform: translateY(-1px);
    }

    .btn-warning {
        background: var(--warning);
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

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow);
    }

    .table th,
    .table td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid var(--light-gray);
    }

    .table th {
        background: var(--light);
        font-weight: 600;
        color: var(--dark);
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .table tbody tr {
        transition: var(--transition);
    }

    .table tbody tr:hover {
        background: rgba(67, 97, 238, 0.05);
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .pagination-info {
        color: var(--gray);
        font-size: 0.9rem;
        flex-shrink: 0;
        white-space: nowrap;
        max-width: 30%;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .pagination-buttons {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: flex-end;
        flex-shrink: 0;
        max-width: 70%;
    }

    .pagination-buttons button {
        padding: 6px 10px;
        border: 1px solid var(--light-gray);
        background: white;
        border-radius: var(--border-radius);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 34px;
        height: 34px;
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .pagination-buttons button:hover {
        background: var(--light);
    }

    .pagination-buttons button.active {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .pagination-buttons button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .pagination {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .pagination-info {
            text-align: center;
            max-width: 100%;
            font-size: 0.85rem;
        }

        .pagination-buttons {
            justify-content: center;
            max-width: 100%;
        }

        .pagination-buttons button {
            padding: 6px 8px;
            min-width: 30px;
            height: 30px;
            font-size: 0.85rem;
        }
    }

    @media (min-width: 769px) and (max-width: 1199px) {
        .pagination-info {
            font-size: 0.85rem;
            max-width: 40%;
        }

        .pagination-buttons {
            max-width: 60%;
        }

        .pagination-buttons button {
            padding: 6px 10px;
            min-width: 32px;
            font-size: 0.85rem;
        }
    }

    /* Toast notification */
    .toast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 12px 20px;
        background: var(--dark);
        color: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
        z-index: 1100;
    }

    .toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    .table-responsive {
        position: relative;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        width: 100%;
    }

/* SweetAlert Custom Styling untuk Delete Confirmation */
.swal-delete-popup {
    border-radius: var(--border-radius) !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3) !important;
}

.swal-delete-popup .swal2-title {
    color: var(--dark) !important;
    font-weight: 600 !important;
    font-size: 1.4rem !important;
}

.swal-delete-popup .swal2-html-container {
    color: var(--gray) !important;
    font-size: 1rem !important;
    line-height: 1.6 !important;
}

.swal-delete-popup .swal2-icon.swal2-warning {
    border-color: var(--warning) !important;
    color: var(--warning) !important;
}
</style>

<style>
    /* SweetAlert Custom Styles */
    .swal-wide {
        width: 500px !important;
    }

    .swal2-popup .swal2-title {
        font-size: 24px !important;
        color: var(--primary) !important;
    }

    .swal2-popup .swal2-confirm {
        background-color: #e63946 !important;
        border-color: #e63946 !important;
        font-weight: 600 !important;
        padding: 10px 30px !important;
    }

    .swal2-popup .swal2-confirm:hover {
        background-color: #c22c38 !important;
        border-color: #c22c38 !important;
    }

    .swal2-popup .swal2-cancel {
        background-color: #4361ee !important;
        border-color: #4361ee !important;
        font-weight: 600 !important;
        padding: 10px 30px !important;
    }

    .swal2-popup .swal2-cancel:hover {
        background-color: #3a56d4 !important;
        border-color: #3a56d4 !important;
    }

    /* Detail Popup Styles */
    .detail-box {
        max-width: 520px;
        margin: auto;
        text-align: left;
        color: #343a40;
        font-family: "Segoe UI", Roboto, sans-serif;
    }

    .detail-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .icon-wrapper {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #d1f1dc, #b0e7c1);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
        color: #198754;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    .detail-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: .25rem;
        color: #343a40;
    }

    .detail-sub {
        font-size: .9rem;
        color: #6c757d;
    }

    .detail-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
        gap: .25rem;
    }

    .detail-label {
        font-size: .9rem;
        font-weight: 600;
        color: #495057;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .detail-value {
        font-size: 1rem;
        color: #343a40;
        font-weight: 500;
    }

    .stok-highlight {
        font-size: 1.2rem;
        font-weight: 700;
        color: #198754;
    }

    .stok-low {
        color: #dc3545 !important;
    }

    .stok-medium {
        color: #ffc107 !important;
    }

    .stok-high {
        color: #198754 !important;
    }
</style>

<div class="container">
    <div class="page-header">
        <h1>
            <i class="fas fa-cubes"></i>
            Master Bahan Baku
        </h1>
        <div class="right-controls">
                    <a href="{{ route('backoffice.master-bahan.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>
            Tambah Master Bahan
        </a>
        </div>
    </div>

    <div class="controls">
        <div class="left-controls">
            <div class="entries-select">
                <label for="entries">Tampilkan</label>
                <select id="entries" onchange="changeEntries(this.value)">
                    <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                </select>
                <span>entri</span>
            </div>
        </div>

        <div class="right-controls">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari bahan baku..." value="{{ request('search') }}" onkeyup="searchTable()">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bahan</th>
                    <th>Satuan</th>
                    <th>Harga per Unit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bahanBakus ?? [] as $index => $bahan)
                <tr>
                    <td>{{ ($bahanBakus->currentPage() - 1) * $bahanBakus->perPage() + $index + 1 }}</td>
                    <td>{{ $bahan->nama_bahan }}</td>
                    <td>{{ $bahan->satuan }}</td>
                    <td>Rp {{ number_format($bahan->harga_per_satuan, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge bg-{{ $bahan->status === 'aktif' ? 'success' : 'secondary' }}">
                            {{ $bahan->status === 'aktif' ? 'Aktif' : 'Non Aktif' }}
                        </span>
                    </td>
                    <td class="action-buttons">
                        <button type="button" class="btn btn-info btn-action" onclick="showDetail({{ $bahan->id }}, '{{ $bahan->nama_bahan }}', '{{ $bahan->satuan }}', {{ $bahan->harga_per_satuan }}, '{{ $bahan->status }}')">
                            <i class="fas fa-eye"></i>
                        </button>
                        <a href="{{ route('backoffice.master-bahan.edit', $bahan->id) }}" class="btn btn-warning btn-action">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-action delete-btn"
                                data-id="{{ $bahan->id }}"
                                data-nama="{{ $bahan->nama_bahan }}"
                                data-url="{{ route('backoffice.master-bahan.destroy', $bahan->id) }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: var(--gray);">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <br>
                        Tidak ada data master bahan baku
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($bahanBakus) && $bahanBakus->hasPages() && $bahanBakus->lastPage() > 1)
    <div class="pagination">
        <div class="pagination-info">
            Menampilkan {{ $bahanBakus->firstItem() ?? 0 }} sampai {{ $bahanBakus->lastItem() ?? 0 }} dari {{ $bahanBakus->total() ?? 0 }} entri
        </div>
        <div class="pagination-buttons">
            @if($bahanBakus->onFirstPage())
                <button disabled><i class="fas fa-chevron-left"></i></button>
            @else
                <a href="{{ $bahanBakus->previousPageUrl() . (request('per_page') ? '&per_page=' . request('per_page') : '') }}"><button><i class="fas fa-chevron-left"></i></button></a>
            @endif

            @foreach($bahanBakus->getUrlRange(1, $bahanBakus->lastPage()) as $page => $url)
                @if($page == $bahanBakus->currentPage())
                    <button class="active">{{ $page }}</button>
                @else
                    <a href="{{ $url . (request('per_page') ? '&per_page=' . request('per_page') : '') }}"><button>{{ $page }}</button></a>
                @endif
            @endforeach

            @if($bahanBakus->hasMorePages())
                <a href="{{ $bahanBakus->nextPageUrl() . (request('per_page') ? '&per_page=' . request('per_page') : '') }}"><button><i class="fas fa-chevron-right"></i></button></a>
            @else
                <button disabled><i class="fas fa-chevron-right"></i></button>
            @endif
        </div>
    </div>
    @elseif(isset($bahanBakus) && $bahanBakus->total() > 0)
    <div class="pagination">
        <div class="pagination-info">
            Menampilkan {{ $bahanBakus->firstItem() ?? 0 }} sampai {{ $bahanBakus->lastItem() ?? 0 }} dari {{ $bahanBakus->total() ?? 0 }} entri
        </div>
        <div class="pagination-buttons">
            <!-- Tombol pagination kosong untuk konsistensi layout -->
        </div>
    </div>
    @elseif(isset($bahanBakus) && $bahanBakus->perPage() >= 1000)
    <div class="pagination">
        <div class="pagination-info">
            Menampilkan semua {{ $bahanBakus->total() ?? 0 }} entri
        </div>
        <div class="pagination-buttons">
            <button class="btn btn-secondary" onclick="resetPagination()">Kembali ke Pagination</button>
        </div>
    </div>
    @endif
</div>

<script>
    // Toast notification function
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i>
            ${message}
        `;
        document.body.appendChild(toast);

        setTimeout(() => toast.classList.add('show'), 100);
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => document.body.removeChild(toast), 300);
        }, 3000);
    }

    // Search functionality
    function searchTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('dataTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let found = false;

            for (let j = 0; j < cells.length - 1; j++) {
                if (cells[j].textContent.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }

            rows[i].style.display = found ? '' : 'none';
        }
    }

    // Change entries per page
    function changeEntries(value) {
        const url = new URL(window.location);
        url.searchParams.set('per_page', value);
        url.searchParams.delete('page'); // Reset to first page
        window.location.href = url.toString();
    }

    // Show detail popup
    function showDetail(id, nama, satuan, hargaPerUnit, status) {
        const html = `
            <div class="detail-box">
                <div class="detail-header">
                    <div class="icon-wrapper">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div>
                        <div class="detail-title">${nama}</div>
                        <div class="detail-sub">Master Bahan Baku</div>
                    </div>
                </div>

                <div class="detail-content">
                    <div class="detail-item">
                        <div class="detail-label">Nama Bahan</div>
                        <div class="detail-value">${nama}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Satuan</div>
                        <div class="detail-value">${satuan}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Harga per Unit</div>
                        <div class="detail-value">Rp ${hargaPerUnit.toLocaleString('id-ID')}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value">
                            <span class="badge bg-${status === 'aktif' ? 'success' : 'secondary'}">${status.charAt(0).toUpperCase() + status.slice(1)}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;

        Swal.fire({
            title: 'Detail Master Bahan Baku',
            html: html,
            showConfirmButton: true,
            confirmButtonText: '<i class="fas fa-times"></i> Tutup',
            confirmButtonColor: '#4361ee',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            width: 600,
            background: '#ffffff',
            padding: '1.8rem',
            customClass: {
                popup: 'swal-detail-popup'
            }
        });
    }

    // Submit delete form
    function submitDeleteForm(url) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;

        // CSRF token
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        form.appendChild(csrfInput);

        // Method spoofing untuk DELETE
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    }

    function confirmDelete(id, nama, url, buttonElement) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            html: `Apakah Anda yakin ingin menghapus master bahan baku <strong>${nama}</strong>?<br><br><small class="text-muted">Data yang dihapus tidak dapat dikembalikan.</small>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e63946',
            cancelButtonColor: '#4361ee',
            confirmButtonText: '<i class="fas fa-trash me-2"></i>Hapus',
            cancelButtonText: '<i class="fas fa-times me-2"></i>Batal',
            reverseButtons: true,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            customClass: {
                popup: 'swal-delete-popup'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                submitDeleteForm(url);
            }
        });
    }

    // Fungsi deleteData lama sudah tidak digunakan
    // Diganti dengan confirmDelete yang menggunakan SweetAlert2
    // function deleteData(event) {
    //     if (confirm('Apakah Anda yakin ingin menghapus bahan baku produksi ini?')) {
    //         const row = event.target.closest('tr');
    //         row.remove();
    //         showToast('Data berhasil dihapus!');
    //     }
    // }

    function resetPagination() {
        // Reset to default pagination (5 entries per page)
        const url = new URL(window.location);
        url.searchParams.set('per_page', '5');
        url.searchParams.delete('page'); // Reset to first page
        window.location.href = url.toString();
    }
</script>
@endsection