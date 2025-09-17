@extends('admin.layouts.app')

@section('title', 'Bahan Baku - Cocofarma')

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
    
    .btn-warning:hover {
        background: #d61c6a;
        transform: translateY(-1px);
    }
    
    .btn-secondary {
        background: #6c757d;
        color: white;
        border: 1px solid #6c757d;
    }
    
    .btn-secondary:hover {
        background: #5a6268;
        border-color: #5a6268;
        transform: translateY(-1px);
    }
    
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 20px;
        position: relative;
        table-layout: fixed;
        min-width: 100%;
        max-width: none;
    }
    
    th, td {
        padding: 8px 10px;
        text-align: left;
        border-bottom: 1px solid var(--light-gray);
        word-wrap: break-word;
        overflow-wrap: break-word;
        max-width: 0;
    }
    
    th:nth-child(3), td:nth-child(3) {
        white-space: normal;
        overflow: visible;
        text-overflow: clip;
    }
    
    th {
        background-color: var(--light);
        font-weight: 600;
        color: var(--dark);
        position: sticky;
        top: 0;
        z-index: 100;
        cursor: pointer;
        user-select: none;
        font-size: 0.9rem;
        white-space: nowrap;
    }
    
    th:hover {
        background-color: #e9ecef;
    }
    
    th i {
        margin-left: 5px;
        font-size: 0.8rem;
        opacity: 0.6;
    }
    
    th.active i {
        opacity: 1;
    }
    
    tr {
        transition: var(--transition);
    }
    
    tr:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }
    
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    .badge-success {
        background: #d4edda;
        color: #155724;
    }
    
    .badge-danger {
        background: #f8d7da;
        color: #721c24;
    }
    
    .actions {
        display: flex;
        justify-content: center;
        gap: 5px;
        min-width: 120px;
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
    
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 1000;
        backdrop-filter: blur(3px);
    }
    
    .modal-content {
        background: white;
        padding: 28px;
        border-radius: var(--border-radius);
        width: 500px;
        max-width: 90%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .modal.show .modal-content {
        transform: scale(1);
        opacity: 1;
    }
    
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--light-gray);
    }
    
    .modal-header h2 {
        font-size: 1.4rem;
        color: var(--dark);
    }
    
    .close {
        font-size: 1.5rem;
        cursor: pointer;
        color: var(--gray);
        transition: var(--transition);
    }
    
    .close:hover {
        color: var(--dark);
        transform: rotate(90deg);
    }
    
    .form-group {
        margin-bottom: 16px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--dark);
        font-size: 0.9rem;
    }
    
    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
        font-size: 0.9rem;
        transition: var(--transition);
    }
    
    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }
    
    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }
    
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid var(--light-gray);
    }
    
    @media (max-width: 768px) {
        body {
            padding: 12px;
        }
        
        .container {
            padding: 16px;
        }
        
        header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }
        
        .controls {
            flex-direction: column;
        }
        
        .left-controls, .right-controls {
            width: 100%;
            flex-wrap: wrap;
        }
        
        .search-box {
            width: 100%;
        }
        
        .search-box input {
            width: 100%;
        }
        
        th, td {
            padding: 6px 8px;
            font-size: 0.8rem;
        }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        table {
            min-width: 800px;
        }
    }
    
    @media (min-width: 1200px) {
        table {
            min-width: 100%;
        }
        
        .table-responsive {
            overflow-x: visible;
        }
        
        .btn-action {
            margin-bottom: 0;
        }
        
        .pagination {
            flex-direction: row;
            gap: 10px;
            justify-content: space-between;
            align-items: center;
        }
        
        .pagination-info {
            text-align: left;
            font-size: 0.8rem;
            flex: 1;
            max-width: 50%;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .pagination-buttons {
            justify-content: flex-end;
            flex-shrink: 0;
        }
        
        .pagination-buttons button {
            padding: 5px 8px;
            min-width: 30px;
            font-size: 0.8rem;
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
    }
    
    /* Animation for table rows */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    tbody tr {
        animation: fadeIn 0.3s ease forwards;
    }
    
    tbody tr:nth-child(odd) {
        background-color: #fafbfc;
    }
    
    /* Status indicator */
    .status-indicator {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 6px;
    }
    
    .status-active {
        background-color: #2ecc71;
    }
    
    .status-inactive {
        background-color: #e74c3c;
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
</style>

<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-cogs"></i> Bahan Baku Produksi</h1>
        <button class="btn btn-primary" id="btnTambah"><i class="fas fa-plus"></i> Tambah Bahan Baku</button>
    </div>
    
    <div class="controls">
        <div class="left-controls">
            <div class="entries-select">
                <label for="entriesSelect">Tampilkan</label>
                <select id="entriesSelect">
                    <option value="5" {{ request('per_page', 5) == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page', 5) == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ request('per_page', 5) == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('per_page', 5) == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('per_page', 5) == 100 ? 'selected' : '' }}>100</option>
                    <option value="all" {{ request('per_page') == 'all' ? 'selected' : '' }}>Semua</option>
                </select>
                <span>entri</span>
            </div>
            
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari bahan baku...">
            </div>
        </div>
        
        <div class="right-controls">
            <button class="btn btn-success" id="btnExport"><i class="fas fa-file-export"></i> Export</button>
            <button class="btn btn-primary" id="btnPrint"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
    
    <div class="table-responsive">
        <table id="dataTable">
        <thead>
            <tr>
                <th data-sort="no" style="width: 6%;">No</th>
                <th data-sort="kode" style="width: 12%;">Kode Bahan <i class="fas fa-sort"></i></th>
                <th data-sort="nama" style="width: 25%;">Nama Bahan <i class="fas fa-sort"></i></th>
                <th data-sort="kategori" style="width: 12%;">Kategori <i class="fas fa-sort"></i></th>
                <th data-sort="satuan" style="width: 10%;">Satuan <i class="fas fa-sort"></i></th>
                <th data-sort="stok" style="width: 12%;">Total Stok <i class="fas fa-sort"></i></th>
                <th data-sort="status" style="width: 10%;">Status <i class="fas fa-sort"></i></th>
                <th style="width: 13%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bahanBakus ?? [] as $index => $bahan)
            <tr>
                <td>{{ $bahanBakus->firstItem() + $index }}</td>
                <td>{{ $bahan->kode_bahan }}</td>
                <td>{{ $bahan->nama_bahan }}</td>
                <td>{{ $bahan->kategori ?? '-' }}</td>
                <td>{{ $bahan->satuan }}</td>
                <td>{{ number_format($bahan->stok ?? 0) }}</td>
                <td>
                    <span class="badge {{ $bahan->status ? 'badge-success' : 'badge-danger' }}">
                        {{ $bahan->status ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('backoffice.bahanbaku.show', $bahan->id) }}" class="btn btn-info btn-action" title="Lihat"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('backoffice.bahanbaku.edit', $bahan->id) }}" class="btn btn-warning btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('backoffice.bahanbaku.destroy', $bahan->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus bahan baku ini?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center; padding: 40px;">Belum ada data bahan baku</td>
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

<!-- Modal Form -->
<div class="modal" id="formModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Tambah Bahan Baku Produksi</h2>
            <span class="close">&times;</span>
        </div>
        
        <form id="dataForm">
            <div class="form-group">
                <label for="kode_bahan">Kode Bahan</label>
                <input type="text" id="kode_bahan" name="kode_bahan" required>
            </div>
            
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <input type="text" id="nama_bahan" name="nama_bahan" required>
            </div>
            
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="operational">Operational</option>
                    <option value="master">Master</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" id="satuan" name="satuan" required>
            </div>
            
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" id="stok" name="stok" min="0" required>
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnBatal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Toast Notification -->
<div class="toast" id="toast"></div>

<script>
    // DOM Elements
    const searchInput = document.getElementById('searchInput');
    const entriesSelect = document.getElementById('entriesSelect');
    const btnTambah = document.getElementById('btnTambah');
    const btnExport = document.getElementById('btnExport');
    const btnPrint = document.getElementById('btnPrint');
    const formModal = document.getElementById('formModal');
    const dataForm = document.getElementById('dataForm');
    const modalTitle = document.getElementById('modalTitle');
    const closeModal = document.querySelector('.close');
    const btnBatal = document.getElementById('btnBatal');
    const table = document.getElementById('dataTable');
    const thElements = document.querySelectorAll('th[data-sort]');
    const toast = document.getElementById('toast');
    
    // Data untuk sorting
    let currentSort = {
        column: null,
        direction: 'asc'
    };
    
    // Event Listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterData);
    }
    if (entriesSelect) {
        entriesSelect.addEventListener('change', changeEntries);
    }
    if (btnTambah) {
        btnTambah.addEventListener('click', openCreateModal);
    }
    if (btnExport) {
        btnExport.addEventListener('click', exportData);
    }
    if (btnPrint) {
        btnPrint.addEventListener('click', printData);
    }
    
    // Modal event listeners
    if (closeModal) {
        closeModal.addEventListener('click', closeFormModal);
    }
    if (btnBatal) {
        btnBatal.addEventListener('click', closeFormModal);
    }
    if (dataForm) {
        dataForm.addEventListener('submit', saveData);
    }
    
    // Add event listeners to action buttons
    document.querySelectorAll('.btn-info').forEach(btn => {
        btn.addEventListener('click', viewData);
    });
    
    document.querySelectorAll('.btn-warning').forEach(btn => {
        btn.addEventListener('click', editData);
    });
    
    document.querySelectorAll('.btn-danger').forEach(btn => {
        btn.addEventListener('click', deleteData);
    });
    
    // Add event listeners to table headers for sorting
    thElements.forEach(th => {
        th.addEventListener('click', () => {
            const column = th.getAttribute('data-sort');
            sortTable(column);
        });
    });
    
    // Functions
    function showToast(message, type = 'success') {
        if (toast) {
            toast.textContent = message;
            toast.style.background = type === 'success' ? '#28a745' : '#dc3545';
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }
    }
    
    function filterData() {
        if (!searchInput || !table) return;
        
        const searchText = searchInput.value.toLowerCase();
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        
        for (let i = 0; i < rows.length; i++) {
            if (rows[i].cells.length < 8) continue; // Skip if not data row
            
            const kode = rows[i].cells[1].textContent.toLowerCase();
            const nama = rows[i].cells[2].textContent.toLowerCase();
            const kategori = rows[i].cells[3].textContent.toLowerCase();
            
            const matchesSearch = kode.includes(searchText) || 
                                nama.includes(searchText) || 
                                kategori.includes(searchText);
            
            if (matchesSearch) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
    
    function changeEntries() {
        if (!entriesSelect) return;
        const entries = entriesSelect.value;
        
        // Update URL with new per_page parameter and reload page
        const url = new URL(window.location);
        if (entries === 'all') {
            url.searchParams.set('per_page', '1000'); // Large number to show all data
        } else {
            url.searchParams.set('per_page', entries);
        }
        url.searchParams.delete('page'); // Reset to first page when changing entries
        window.location.href = url.toString();
    }
    
    function sortTable(column) {
        // NOTE: This client-side sorting is for demo purposes only.
        // In a real application, sorting should be done server-side to maintain
        // consistent numbering across pagination pages.
        
        // Update current sort
        if (currentSort.column === column) {
            currentSort.direction = currentSort.direction === 'asc' ? 'desc' : 'asc';
        } else {
            currentSort.column = column;
            currentSort.direction = 'asc';
        }
        
        // Update UI to show current sort
        thElements.forEach(th => {
            th.classList.remove('active');
            const icon = th.querySelector('i');
            if (icon) {
                icon.className = 'fas fa-sort';
            }
        });
        
        const currentTh = document.querySelector(`th[data-sort="${column}"]`);
        if (currentTh) {
            currentTh.classList.add('active');
            const currentIcon = currentTh.querySelector('i');
            if (currentIcon) {
                currentIcon.className = currentSort.direction === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down';
            }
        }
        
        // Get table rows
        const tbody = table.getElementsByTagName('tbody')[0];
        const rows = Array.from(tbody.getElementsByTagName('tr'));
        
        // Sort rows based on column and direction
        rows.sort((a, b) => {
            if (a.cells.length < 8 || b.cells.length < 8) return 0;
            
            let aValue, bValue;
            const colIndex = getColumnIndex(column);
            
            if (column === 'no') {
                aValue = parseInt(a.cells[colIndex].textContent);
                bValue = parseInt(b.cells[colIndex].textContent);
            } else if (column === 'stok') {
                aValue = parseInt(a.cells[colIndex].textContent);
                bValue = parseInt(b.cells[colIndex].textContent);
            } else {
                aValue = a.cells[colIndex].textContent.toLowerCase();
                bValue = b.cells[colIndex].textContent.toLowerCase();
            }
            
            if (aValue < bValue) return currentSort.direction === 'asc' ? -1 : 1;
            if (aValue > bValue) return currentSort.direction === 'asc' ? 1 : -1;
            return 0;
        });
        
        // Remove existing rows
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        
        // Add sorted rows
        rows.forEach(row => {
            tbody.appendChild(row);
        });
    }
    
    function getColumnIndex(column) {
        const headers = Array.from(table.querySelectorAll('th'));
        return headers.findIndex(header => header.getAttribute('data-sort') === column);
    }
    
    function openCreateModal() {
        modalTitle.textContent = 'Tambah Bahan Baku Produksi';
        dataForm.reset();
        formModal.style.display = 'flex';
        setTimeout(() => {
            formModal.classList.add('show');
        }, 10);
    }
    
    function closeFormModal() {
        formModal.classList.remove('show');
        setTimeout(() => {
            formModal.style.display = 'none';
        }, 300);
    }
    
    function exportData() {
        showToast('Mempersiapkan data untuk diexport...', 'info');
    }
    
    function printData() {
        showToast('Mempersiapkan data untuk dicetak...', 'info');
    }
    
    function viewData(event) {
        const row = event.target.closest('tr');
        const cells = row.getElementsByTagName('td');
        
        alert(
            `Detail Bahan Baku:\n\n` +
            `Kode: ${cells[1].textContent}\n` +
            `Nama: ${cells[2].textContent}\n` +
            `Kategori: ${cells[3].textContent}\n` +
            `Satuan: ${cells[4].textContent}\n` +
            `Stok: ${cells[5].textContent}\n` +
            `Status: ${cells[6].textContent}`
        );
    }
    
    function editData(event) {
        const row = event.target.closest('tr');
        const cells = row.getElementsByTagName('td');
        
        modalTitle.textContent = 'Edit Bahan Baku';
        document.getElementById('kode_bahan').value = cells[1].textContent;
        document.getElementById('nama_bahan').value = cells[2].textContent;
        document.getElementById('kategori').value = cells[3].textContent.toLowerCase();
        document.getElementById('satuan').value = cells[4].textContent;
        document.getElementById('stok').value = parseInt(cells[5].textContent.replace(/,/g, ''));
        document.getElementById('status').value = cells[6].textContent === 'Aktif' ? '1' : '0';
        
        formModal.style.display = 'flex';
        setTimeout(() => {
            formModal.classList.add('show');
        }, 10);
    }
    
    function deleteData(event) {
        if (confirm('Apakah Anda yakin ingin menghapus bahan baku produksi ini?')) {
            const row = event.target.closest('tr');
            row.remove();
            showToast('Data berhasil dihapus!');
        }
    }
    
    function saveData(event) {
        event.preventDefault();
        
        const kode = document.getElementById('kode_bahan').value;
        const nama = document.getElementById('nama_bahan').value;
        const kategori = document.getElementById('kategori').value;
        const deskripsi = document.getElementById('deskripsi').value;
        const satuan = document.getElementById('satuan').value;
        const stok = document.getElementById('stok').value;
        const status = document.getElementById('status').value;
        
        if (modalTitle.textContent === 'Tambah Bahan Baku') {
            // Add new row
            const tbody = table.getElementsByTagName('tbody')[0];
            const newRow = tbody.insertRow();
            
            const noCell = newRow.insertCell(0);
            const kodeCell = newRow.insertCell(1);
            const namaCell = newRow.insertCell(2);
            const kategoriCell = newRow.insertCell(3);
            const satuanCell = newRow.insertCell(4);
            const stokCell = newRow.insertCell(5);
            const statusCell = newRow.insertCell(6);
            const aksiCell = newRow.insertCell(7);
            
            // Calculate next number based on current page and items per page
            const currentPage = {{ $bahanBakus->currentPage() ?? 1 }};
            const perPage = {{ $bahanBakus->perPage() ?? 5 }};
            const totalItems = {{ $bahanBakus->total() ?? 0 }};
            const nextNumber = totalItems + 1;
            noCell.textContent = nextNumber;
            
            kodeCell.textContent = kode;
            namaCell.textContent = nama;
            kategoriCell.textContent = kategori === 'operational' ? 'Operational' : 'Master';
            satuanCell.textContent = satuan;
            stokCell.textContent = parseInt(stok).toLocaleString();
            statusCell.innerHTML = `<span class="badge ${status === '1' ? 'badge-success' : 'badge-danger'}">${status === '1' ? 'Aktif' : 'Nonaktif'}</span>`;
            aksiCell.innerHTML = `
                <div class="actions">
                    <button class="btn btn-info btn-action" title="Lihat" onclick="viewData(event)"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-warning btn-action" title="Edit" onclick="editData(event)"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-action" title="Hapus" onclick="deleteData(event)"><i class="fas fa-trash"></i></button>
                </div>
            `;
            
            showToast('Bahan baku produksi berhasil ditambahkan!');
        } else {
            // Update existing row - in real app this would make an AJAX call
            showToast('Bahan baku produksi berhasil diupdate!');
        }
        
        closeFormModal();
    }
    
    // Close modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === formModal) {
            closeFormModal();
        }
    });
    
    function resetPagination() {
        // Reset to default pagination (5 entries per page)
        const url = new URL(window.location);
        url.searchParams.set('per_page', '5');
        url.searchParams.delete('page'); // Reset to first page
        window.location.href = url.toString();
    }
</script>
@endsection