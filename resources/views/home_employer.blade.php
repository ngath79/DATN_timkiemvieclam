<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Trang Chủ Nhà Tuyển Dụng')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Trang Chủ Nhà Tuyển Dụng</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chào, {{ Auth::guard('employer')->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout_employer') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Đăng Xuất
                        </a>
                        <form id="logout-form" action="{{ route('logout_employer') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Menu Ngang -->
    <div class="bg-light py-2">
        <div class="container">
            <ul class="nav nav-tabs ">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard_employer') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer_manage_jobs') }}">Quản lý đăng tuyển</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer_manage_candidates') }}">Quản lý ứng viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('info_company-employer') }}">Thông tin công ty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer_account_info') }}">Thông tin tài khoản</a>
                </li>
            </ul>
        </div>
    </div>
    

    <!-- Main Content -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-3 mt-5">
        <p class="mb-0">© 2024 Your Company. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
