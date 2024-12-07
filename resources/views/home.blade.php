@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2>Chào Mừng Bạn Đến Với Trang Web Của Chúng Tôi!</h2>
            <p>Đây là trang chủ của hệ thống tìm kiếm việc làm. Bạn có thể đăng ký hoặc đăng nhập để sử dụng các tính năng của hệ thống.</p>
            
            @guest
                <a href="{{ route('login.form') }}" class="btn btn-primary m-2">Đăng Nhập</a>
                <a href="{{ route('register.user') }}" class="btn btn-success m-2">Đăng Ký Người Dùng</a>
                <a href="{{ route('register.employer') }}" class="btn btn-warning m-2">Đăng Ký Nhà Tuyển Dụng</a> <!-- Nút đăng ký nhà tuyển dụng -->
            @else
                <p>Chào mừng, {{ Auth::user()->name }}! Bạn đã đăng nhập.</p>
            @endguest
        </div>
    </div>
</div>
@endsection
