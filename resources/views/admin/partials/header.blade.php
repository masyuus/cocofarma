<header class="admin-header">
    @php
        if(!function_exists('route_exists')){
            function route_exists($name){
                return 
                    class_exists(\Illuminate\Support\Facades\Route::class) && \Illuminate\Support\Facades\Route::has($name);
            }
        }
    @endphp
    <div class="header-content">
        <div class="breadcrumb-section">
            <nav aria-label="breadcrumb">
                        @php
                            // Compute breadcrumb based on current admin route
                            $crumbs = [];
                            // Home / Dashboard
                        $crumbs[] = ['label' => 'Dashboard', 'url' => route_exists('backoffice.dashboard') ? route('backoffice.dashboard') : '#'];

                            // Operasional group
                            if(request()->routeIs('backoffice.pesanan.*') || request()->routeIs('backoffice.produksi.*') || request()->routeIs('backoffice.transaksi.*') || request()->routeIs('backoffice.laporan.*') || request()->routeIs('backoffice.bahanbaku.*')){
                                $crumbs[] = ['label' => 'Operasional', 'url' => route_exists('backoffice.pesanan.index') ? route('backoffice.pesanan.index') : '#'];
                            }

                            // Master group
                            if(request()->routeIs('backoffice.master-produk.*') || request()->routeIs('backoffice.master-user.*') || request()->routeIs('backoffice.pengaturan.*') || request()->routeIs('backoffice.master-bahan.*') ){
                                $crumbs[] = ['label' => 'Master', 'url' => route_exists('backoffice.master-produk.index') ? route('backoffice.master-produk.index') : '#'];
                            }

                            // Specific page
                            if(request()->routeIs('backoffice.pesanan.*')){ $crumbs[] = ['label' => 'Pesanan', 'url' => route_exists('backoffice.pesanan.index') ? route('backoffice.pesanan.index') : '#']; }
                            if(request()->routeIs('backoffice.bahanbaku.*')){ $crumbs[] = ['label' => 'Bahan Baku', 'url' => route_exists('backoffice.bahanbaku.index') ? route('backoffice.bahanbaku.index') : '#']; }
                            if(request()->routeIs('backoffice.master-produk.*')){ $crumbs[] = ['label' => 'Produk', 'url' => route_exists('backoffice.master-produk.index') ? route('backoffice.master-produk.index') : '#']; }
                            if(request()->routeIs('backoffice.produksi.*')){ $crumbs[] = ['label' => 'Produksi', 'url' => route_exists('backoffice.produksi.index') ? route('backoffice.produksi.index') : '#']; }
                            if(request()->routeIs('backoffice.transaksi.*')){ $crumbs[] = ['label' => 'Penjualan', 'url' => route_exists('backoffice.transaksi.index') ? route('backoffice.transaksi.index') : '#']; }
                            if(request()->routeIs('backoffice.laporan.*')){ $crumbs[] = ['label' => 'Laporan', 'url' => route_exists('backoffice.laporan.index') ? route('backoffice.laporan.index') : '#']; }
                            if(request()->routeIs('backoffice.master-user.*')){ $crumbs[] = ['label' => 'User & Hak Akses', 'url' => route_exists('backoffice.master-user.index') ? route('backoffice.master-user.index') : '#']; }
                            if(request()->routeIs('backoffice.master-bahan.*')){ $crumbs[] = ['label' => 'Bahan Baku', 'url' => route_exists('backoffice.master-bahan.index') ? route('backoffice.master-bahan.index') : '#']; }
                            if(request()->routeIs('backoffice.pengaturan.*')){ $crumbs[] = ['label' => 'Pengaturan Sistem', 'url' => route_exists('backoffice.pengaturan.index') ? route('backoffice.pengaturan.index') : '#']; }

                            // Helper for page title
                            $computedTitle = end($crumbs)['label'] ?? ($pageTitle ?? 'Dashboard');
                        @endphp

                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route_exists('backoffice.dashboard') ? route('backoffice.dashboard') : '#' }}" class="text-decoration-none">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            @foreach($crumbs as $index => $c)
                                @if($index === 0)
                                    {{-- skip dashboard here because we render home icon above --}}
                                    @continue
                                @endif
                                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current=page' : '' }}>
                                    @if(!$loop->last && $c['url'] !== '#')
                                        <a href="{{ $c['url'] }}">{{ $c['label'] }}</a>
                                    @else
                                        {{ $c['label'] }}
                                    @endif
                                </li>
                            @endforeach
                        </ol>
            </nav>
            <h1 class="page-title">{{ $pageTitle ?? $computedTitle }}</h1>
        </div>

        <div class="header-actions">
            <div class="system-info">
                <div class="date-time">
                    <div class="date">
                        <i class="bx bx-calendar"></i>
                        <span id="currentDate">{{ now()->format('l, d M Y') }}</span>
                    </div>
                    <div class="time">
                        <i class="bx bx-time"></i>
                        <span id="currentTime">{{ now()->format('H:i:s') }}</span>
                    </div>
                </div>
                <div class="status">
                    <i class="bx bx-circle" style="color: #28a745;"></i>
                    <span>Online</span>
                </div>
            </div>

            <div class="notifications">
                <button class="btn btn-link position-relative" id="notificationBtn">
                    <i class="bx bx-bell"></i>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
                </button>
            </div>

            <div class="user-menu">
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            <span>{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                        </div>
                        <div class="user-info d-none d-md-block">
                            <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                            <div class="user-role">{{ Auth::user()->role ?? 'Administrator' }}</div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bx bx-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bx bx-cog"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-log-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
.admin-header {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-bottom: 1px solid #e9ecef;
    padding: 1.5rem 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    backdrop-filter: blur(10px);
}

.header-content {
    max-width: 100%;
    margin: 0 auto;
    padding: 0 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.breadcrumb-section {
    flex: 1;
}

.breadcrumb {
    background: transparent;
    margin-bottom: 0.5rem;
    padding: 0;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
}

.breadcrumb-item a {
    color: #6c757d;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: #495057;
}

.breadcrumb-item.active {
    color: #4299e1;
    font-weight: 700;
}

.breadcrumb-item a {
    color: #6c757d;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: #495057;
    text-decoration: underline;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: #6c757d;
    padding: 0 0.5rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2d3748;
    margin: 0;
    background: linear-gradient(135deg, #2d3748 0%, #4299e1 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.system-info {
    display: flex;
    align-items: flex-start;
    gap: 1.5rem;
    font-size: 0.875rem;
    color: #6c757d;
}

.date-time, .status {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.date-time {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.25rem;
}

.date, .time {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
}

.time {
    color: #718096;
    font-weight: 500;
}

.date-time i, .status i {
    font-size: 1rem;
}

.status i {
    font-size: 0.75rem;
}

.notifications .btn {
    color: #718096;
    padding: 0.5rem;
    border-radius: 8px;
    position: relative;
}

.notifications .btn:hover {
    background: rgba(66, 153, 225, 0.1);
    color: #4299e1;
    transform: scale(1.05);
    transition: all 0.2s ease;
}

.notifications .badge {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    min-width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.user-menu .btn {
    color: #718096;
    padding: 0.5rem;
    border-radius: 8px;
    text-decoration: none !important;
}

.user-menu .btn:hover {
    background: transparent;
    color: #718096;
    transform: none;
    transition: all 0.2s ease;
    text-decoration: none !important;
}

.user-menu .btn * {
    text-decoration: none !important;
}

.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.875rem;
    margin-right: 0.75rem;
}

.user-info {
    text-align: left;
}

.user-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: #2d3748;
    line-height: 1.2;
    text-decoration: none !important;
}

.user-role {
    font-size: 0.75rem;
    color: #718096;
    line-height: 1.2;
    text-decoration: none !important;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    border-radius: 8px;
    padding: 0.5rem 0;
    margin-top: 0.5rem;
}

.dropdown-item {
    padding: 0.75rem 1.5rem;
    font-size: 0.875rem;
    color: #4a5568;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    text-decoration: none !important;
}

.dropdown-item:hover {
    background: #f7fafc;
    color: #2d3748;
    text-decoration: none !important;
}

.dropdown-item.text-danger:hover {
    background: #fed7d7;
    color: #e53e3e;
    text-decoration: none !important;
}

.dropdown-divider {
    margin: 0.5rem 0;
    border-color: #e2e8f0;
}

/* Responsive */
@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }

    .breadcrumb-section {
        text-align: center;
    }

    .header-actions {
        justify-content: center;
        flex-wrap: wrap;
    }

    .user-info {
        display: none;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 1.5rem;
    }

    .header-actions {
        gap: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateDateTime() {
        const now = new Date();

        // Update date
        const dateOptions = {
            weekday: 'long',
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        };
        const formattedDate = now.toLocaleDateString('en-US', dateOptions);
        document.getElementById('currentDate').textContent = formattedDate;

        // Update time
        const timeOptions = {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        const formattedTime = now.toLocaleTimeString('en-US', timeOptions);
        document.getElementById('currentTime').textContent = formattedTime;
    }

    // Update immediately
    updateDateTime();

    // Update every second
    setInterval(updateDateTime, 1000);
});
</script>