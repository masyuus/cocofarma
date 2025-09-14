<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Cocofarma Backoffice</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter-ui.css">
    <link rel="stylesheet" href="{{ asset('bolopa/css/adminlogin.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
</head>
<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">
                    <img src="{{ asset('bolopa/images/gif/COCOFARMAbyLoopA.gif') }}" class="logo-image">
                </div>
                <div class="eula">Management System</div>
                <div class="admin-login">Admin Login</div>
            </div>
            <div class="right">
                <svg viewBox="0 0 320 300">
                    <defs>
                        <linearGradient
                                        inkscape:collect="always"
                                        id="linearGradient"
                                        x1="13"
                                        y1="193.49992"
                                        x2="307"
                                        y2="193.49992"
                                        gradientUnits="userSpaceOnUse">
                            <stop
                                  style="stop-color:#ff00ff;"
                                  offset="0"
                                  id="stop876" />
                            <stop
                                  style="stop-color:#ff0000;"
                                  offset="1"
                                  id="stop878" />
                        </linearGradient>
                    </defs>
                    <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                </svg>
                <form method="POST" action="{{ route('admin.login') }}" id="loginForm" class="form">
                    @csrf
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <input type="submit" id="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        // Check for session messages
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '<i class="bi bi-check-circle-fill text-success"></i> Berhasil!',
                html: '<strong>{{ session("success") }}</strong><br><small>Anda akan diarahkan ke dashboard...</small>',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    window.location.href = '{{ route("admin.dashboard") }}';
                }
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: '<i class="bi bi-exclamation-triangle-fill text-danger"></i> Login Gagal!',
                html: '<strong>{{ session("error") }}</strong><br><small>Silakan coba lagi.</small>',
                confirmButtonText: '<i class="bi bi-arrow-repeat"></i> Coba Lagi',
                confirmButtonColor: '#dc3545',
                allowOutsideClick: false
            });
        @endif

        // SVG Animation
        var current = null;
        document.querySelector('#username').addEventListener('focus', function(e) {
            if (current) current.pause();
            current = anime({
                targets: 'path',
                strokeDashoffset: {
                    value: 0,
                    duration: 700,
                    easing: 'easeOutQuart'
                },
                strokeDasharray: {
                    value: '240 1386',
                    duration: 700,
                    easing: 'easeOutQuart'
                }
            });
        });
        document.querySelector('#password').addEventListener('focus', function(e) {
            if (current) current.pause();
            current = anime({
                targets: 'path',
                strokeDashoffset: {
                    value: -336,
                    duration: 700,
                    easing: 'easeOutQuart'
                },
                strokeDasharray: {
                    value: '240 1386',
                    duration: 700,
                    easing: 'easeOutQuart'
                }
            });
        });
        document.querySelector('#submit').addEventListener('focus', function(e) {
            if (current) current.pause();
            current = anime({
                targets: 'path',
                strokeDashoffset: {
                    value: -730,
                    duration: 700,
                    easing: 'easeOutQuart'
                },
                strokeDasharray: {
                    value: '530 1386',
                    duration: 700,
                    easing: 'easeOutQuart'
                }
            });
        });
    </script>
</body>
</html>