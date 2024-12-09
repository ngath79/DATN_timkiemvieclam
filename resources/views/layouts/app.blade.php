<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Trang Chủ')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Trang Chủ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
    <!-- Hiển thị nếu không có ai đăng nhập -->
    @if(!Auth::guard('web')->check() && !Auth::guard('employer')->check())
    <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.user') }}">Đăng Ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.form') }}">Đăng Nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register.employer') }}">Đăng Ký Nhà Tuyển Dụng</a> <!-- Nút đăng ký nhà tuyển dụng -->
                        </li>
    @endif

    <!-- Hiển thị nếu user đăng nhập -->
    @if(Auth::guard('web')->check())
        <li class="nav-item">
            <span class="nav-link">Chào, {{ Auth::guard('web')->user()->name }}!</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form-web').submit();">
               Đăng Xuất
            </a>
            <form id="logout-form-web" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endif

    <!-- Hiển thị nếu employer đăng nhập -->
    @if(Auth::guard('employer')->check())
        <li class="nav-item">
            <span class="nav-link">Chào, {{ Auth::guard('employer')->user()->name }}!</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout_employer') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form-employer').submit();">
               Đăng Xuất
            </a>
            <form id="logout-form-employer" action="{{ route('logout_employer') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endif
</ul>

            </div>
        </div>
    </nav>

   

    <!-- Main Content -->
    <main class="container mt-5 pt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-center text-white py-3 mt-5">
        <p class="mb-0">© 2024 Your Company. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
