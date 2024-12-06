<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Chủ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-light shadow-sm py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('home') }}" class="text-dark text-decoration-none fs-4 fw-bold">JobFinder</a>
            <nav>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Đăng ký</a>
                @else
                    <span class="me-3">Chào, {{ auth()->user()->name }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Đăng xuất</button>
                    </form>
                @endguest
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 text-center">
        <div class="container">
            <p>© 2024 JobFinder. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
