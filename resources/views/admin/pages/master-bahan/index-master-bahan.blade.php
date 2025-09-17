@extends('admin.layouts.app')

@section('title', 'Master Bahan Baku')

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
        max-width: 1200px;
        margin: 0 auto;
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        padding: 24px;
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

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        margin-bottom: 20px;
        position: relative;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid var(--light-gray);
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
    }

    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .pagination-info {
        color: var(--gray);
        font-size: 0.9rem;
    }

    .pagination-buttons {
        display: flex;
        gap: 5px;
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
            padding: 10px 12px;
            font-size: 0.85rem;
        }

        .btn-action {
            margin-bottom: 0;
        }

        .pagination {
            flex-direction: column;
            gap: 15px;
        }

        .pagination-buttons {
            flex-wrap: wrap;
            justify-content: center;
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
    
    .table-responsive {
        position: relative;
        border: 1px solid var(--light-gray);
        border-radius: var(--border-radius);
    }
</style>

<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-boxes"></i> Master Bahan Baku</h1>
        <a href="{{ route('backoffice.master-bahan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Master Bahan</a>
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
                </select>
                <span>entri</span>
            </div>

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Cari master bahan...">
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
                <th data-sort="no">No</th>
                <th data-sort="kode">Kode Bahan <i class="fas fa-sort"></i></th>
                <th data-sort="nama">Nama Bahan <i class="fas fa-sort"></i></th>
                <th data-sort="kategori">Kategori <i class="fas fa-sort"></i></th>
                <th data-sort="deskripsi">Deskripsi</th>
                <th data-sort="satuan">Satuan</th>
                <th data-sort="stok">Total Stok <i class="fas fa-sort"></i></th>
                <th data-sort="status">Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bahanBakus ?? [] as $index => $bahan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $bahan->kode_bahan }}</td>
                <td>{{ $bahan->nama_bahan }}</td>
                <td>{{ $bahan->kategori ?? '-' }}</td>
                <td>{{ $bahan->deskripsi ?? '-' }}</td>
                <td>{{ $bahan->satuan }}</td>
                <td>{{ number_format($bahan->stok ?? 0) }}</td>
                <td>
                    <span class="badge {{ $bahan->status ? 'badge-success' : 'badge-danger' }}">
                        {{ $bahan->status ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td class="actions">
                    <a href="{{ route('backoffice.master-bahan.show', $bahan->id) }}" class="btn btn-info btn-action" title="Lihat"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('backoffice.master-bahan.edit', $bahan->id) }}" class="btn btn-warning btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('backoffice.master-bahan.destroy', $bahan->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus master bahan ini?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center; padding: 40px;">Belum ada data master bahan baku</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </div>

    @if(isset($bahanBakus) && $bahanBakus->hasPages())
    <div class="pagination">
        <div class="pagination-info">
            Menampilkan {{ $bahanBakus->firstItem() ?? 0 }} sampai {{ $bahanBakus->lastItem() ?? 0 }} dari {{ $bahanBakus->total() ?? 0 }} entri
        </div>
        <div class="pagination-buttons">
            @if($bahanBakus->onFirstPage())
                <button disabled><i class="fas fa-chevron-left"></i></button>
            @else
                <a href="{{ $bahanBakus->previousPageUrl() }}"><button><i class="fas fa-chevron-left"></i></button></a>
            @endif

            @foreach($bahanBakus->getUrlRange(1, $bahanBakus->lastPage()) as $page => $url)
                @if($page == $bahanBakus->currentPage())
                    <button class="active">{{ $page }}</button>
                @else
                    <a href="{{ $url }}"><button>{{ $page }}</button></a>
                @endif
            @endforeach

            @if($bahanBakus->hasMorePages())
                <a href="{{ $bahanBakus->nextPageUrl() }}"><button><i class="fas fa-chevron-right"></i></button></a>
            @else
                <button disabled><i class="fas fa-chevron-right"></i></button>
            @endif
        </div>
    </div>
    @endif
</div>

<script>
    // DOM Elements
    const searchInput = document.getElementById('searchInput');
    const entriesSelect = document.getElementById('entriesSelect');
    const btnExport = document.getElementById('btnExport');
    const btnPrint = document.getElementById('btnPrint');
    const table = document.getElementById('dataTable');
    const thElements = document.querySelectorAll('th[data-sort]');

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
    if (btnExport) {
        btnExport.addEventListener('click', exportData);
    }
    if (btnPrint) {
        btnPrint.addEventListener('click', printData);
    }

    // Add event listeners to table headers for sorting
    thElements.forEach(th => {
        th.addEventListener('click', () => {
            const column = th.getAttribute('data-sort');
            sortTable(column);
        });
    });

    // Functions
    function showToast(message, type = 'success') {
        // Simple alert for now
        alert(message);
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
        url.searchParams.set('per_page', entries);
        window.location.href = url.toString();
    }

    function sortTable(column) {
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

    function exportData() {
        showToast('Mempersiapkan data untuk diexport...', 'info');
    }

    function printData() {
        showToast('Mempersiapkan data untuk dicetak...', 'info');
    }
</script>
@endsection