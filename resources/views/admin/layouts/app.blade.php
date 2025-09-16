<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - {{ $pageTitle ?? 'Dashboard' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link href="{{ asset('bolopa/back/css/admin-dashboard.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <section class="home-section">
        <!-- Header -->
        @include('admin.partials.header')

        <!-- Page Content -->
        <main class="main-content">
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
                    title: '<i class="bi bi-check-circle-fill text-success"></i> Berhasil!',
                    html: '<strong>{{ session('success') }}</strong>',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: true,
                    confirmButtonText: '<i class="bi bi-check-circle"></i> OK',
                    confirmButtonColor: '#28a745',
                    allowOutsideClick: true,
                    allowEscapeKey: true
                });
            @endif

            // Handle error messages
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '<i class="bi bi-exclamation-triangle-fill text-danger"></i> Error!',
                    html: '<strong>{{ session('error') }}</strong>',
                    confirmButtonText: '<i class="bi bi-arrow-repeat"></i> OK',
                    confirmButtonColor: '#dc3545',
                    allowOutsideClick: true
                });
            @endif

            // Handle info messages
            @if (session('info'))
                Swal.fire({
                    icon: 'info',
                    title: '<i class="bi bi-info-circle-fill text-info"></i> Info!',
                    html: '<strong>{{ session('info') }}</strong>',
                    confirmButtonText: '<i class="bi bi-check-circle"></i> OK',
                    confirmButtonColor: '#17a2b8',
                    allowOutsideClick: true
                });
            @endif

            // Handle warning messages
            @if (session('warning'))
                Swal.fire({
                    icon: 'warning',
                    title: '<i class="bi bi-exclamation-triangle-fill text-warning"></i> Peringatan!',
                    html: '<strong>{{ session('warning') }}</strong>',
                    confirmButtonText: '<i class="bi bi-check-circle"></i> OK',
                    confirmButtonColor: '#ffc107',
                    allowOutsideClick: true
                });
            @endif
        });
    </script>

    @stack('scripts')
</body>
</html>
