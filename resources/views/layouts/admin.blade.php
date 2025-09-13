<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cocofarma | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />
    
    <!-- Third Party Plugin(OverlayScrollbars) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" crossorigin="anonymous" />
    
    <!-- Third Party Plugin(Bootstrap Icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
    
    <!-- Required Plugin(AdminLTE) -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}" />
    
    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!-- App Wrapper -->
    <div class="app-wrapper">
        <!-- Header -->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <!-- Start Navbar Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                </ul>
                
                <!-- End Navbar Links -->
                <ul class="navbar-nav ms-auto">
                    <!-- User Menu Dropdown -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->full_name) }}&background=4f5962&color=fff" class="user-image rounded-circle shadow" alt="User Image" />
                            <span class="d-none d-md-inline">{{ Auth::user()->full_name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!-- User Image -->
                            <li class="user-header text-bg-primary">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->full_name) }}&background=4f5962&color=fff" class="rounded-circle shadow" alt="User Image" />
                                <p>
                                    {{ Auth::user()->full_name }}
                                    <small>Administrator</small>
                                </p>
                            </li>
                            <!-- Menu Footer -->
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-end" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Sidebar -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!-- Sidebar Brand -->
            <div class="sidebar-brand">
                <a href="{{ route('dashboard') }}" class="brand-link">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190426.png" alt="Cocofarma Logo" class="brand-image opacity-75 shadow" />
                    <span class="brand-text fw-light">Cocofarma</span>
                </a>
            </div>
            
            <!-- Sidebar Wrapper -->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!-- Sidebar Menu -->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        <li class="nav-header">MANAJEMEN</li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-box-seam-fill"></i>
                                <p>
                                    Produk
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Daftar Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index', ['category' => 'bahan_baku']) }}" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Bahan Baku</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-gear-fill"></i>
                                <p>
                                    Produksi
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Riwayat Produksi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Tambah Produksi</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-cart-fill"></i>
                                <p>Pesanan</p>
                            </a>
                        </li>
                        
                        <li class="nav-header">LAPORAN</li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-file-earmark-text-fill"></i>
                                <p>Laporan Penjualan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        
        <!-- App Main -->
        <main class="app-main">
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Cocofarma Admin Panel</div>
            <strong>
                Copyright &copy; 2024-2025&nbsp;
                <a href="#" class="text-decoration-none">Cocofarma</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>
    
    <!-- Scripts -->
    <!-- Third Party Plugin(OverlayScrollbars) -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    
    <!-- Required Plugin(popperjs for Bootstrap 5) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    
    <!-- Required Plugin(Bootstrap 5) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
    <!-- Required Plugin(AdminLTE) -->
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    
    <!-- OverlayScrollbars Configure -->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal !== 'undefined' && OverlayScrollbarsGlobal.OverlayScrollbars) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>