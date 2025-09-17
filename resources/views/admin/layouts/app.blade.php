<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $pageTitle ?? 'Backoffice' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Favicon (tab icon) -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('bolopa/back/images/icon/twemoji--coconut.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('bolopa/back/images/icon/twemoji--coconut.svg') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @stack('styles')
</head>
<body style="margin: 0; min-height: 100vh; display: flex; flex-direction: column; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc;">
    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <section class="home-section" style="flex: 1; display: flex; flex-direction: column;">
        <!-- Header -->
        @include('admin.partials.header')

        <!-- Page Content -->
        <main class="main-content" style="flex: 1; position: relative;">
            <div id="loading-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); display: flex; justify-content: center; align-items: center; z-index: 10;">
                <i class="fas fa-spinner fa-spin fa-3x text-primary"></i>
            </div>
            @yield('content')
        </main>

        <!-- Footer -->
        @include('admin.partials.footer')
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ApexCharts JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Global Success/Error Message Handler -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle success messages
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '<i class="fas fa-check-circle text-success"></i> Berhasil!',
                    html: '<strong>{{ session('success') }}</strong>',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: '<i class="fas fa-check-circle"></i> OK',
                    confirmButtonColor: '#28a745',
                    allowOutsideClick: true,
                    allowEscapeKey: true
                });
            @endif

            // Handle error messages
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '<i class="fas fa-exclamation-triangle text-danger"></i> Error!',
                    html: '<strong>{{ session('error') }}</strong>',
                    confirmButtonText: '<i class="fas fa-redo"></i> OK',
                    confirmButtonColor: '#dc3545',
                    allowOutsideClick: true
                });
            @endif

            // Handle info messages
            @if (session('info'))
                Swal.fire({
                    icon: 'info',
                    title: '<i class="fas fa-info-circle text-info"></i> Info!',
                    html: '<strong>{{ session('info') }}</strong>',
                    confirmButtonText: '<i class="fas fa-check-circle"></i> OK',
                    confirmButtonColor: '#17a2b8',
                    allowOutsideClick: true
                });
            @endif

            // Handle warning messages
            @if (session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: '<i class="fas fa-exclamation-triangle text-warning"></i> Peringatan!',
                    html: '<strong>{{ session('warning') }}</strong>',
                    confirmButtonText: '<i class="fas fa-check-circle"></i> OK',
                    confirmButtonColor: '#ffc107',
                    allowOutsideClick: true
                });
            @endif
        });

        // Hide loading overlay after page load with minimum duration
        window.addEventListener('load', function() {
            const loadingOverlay = document.getElementById('loading-overlay');
            if (loadingOverlay) {
                // Minimum loading duration of 2 seconds
                setTimeout(function() {
                    loadingOverlay.style.display = 'none';
                }, 1500);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
