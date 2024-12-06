<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-light shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-dark text-decoration-none fs-4 fw-bold">JobFinder</a>

            <!-- Auth Buttons -->
            <div>
                @guest
                    <!-- Hiển thị nút nếu chưa đăng nhập -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Đăng ký</a>
                @else
                    <!-- Hiển thị nếu đã đăng nhập -->
                    <span class="me-2">Chào, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Đăng xuất</button>
                    </form>
                @endguest
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">
        <div class="text-center">
            <h1>Chào mừng bạn đến với JobFinder</h1>
            <p class="lead">Nền tảng kết nối nhà tuyển dụng và ứng viên.</p>
            <div class="mt-4">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-2">Đăng ký ngay</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">Tìm việc ngay</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>© 2024 JobFinder. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
