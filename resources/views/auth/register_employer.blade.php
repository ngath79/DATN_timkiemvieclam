@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Đăng ký Nhà tuyển dụng</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Đăng ký Nhà tuyển dụng -->
    <form action="{{ route('register.employer') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên Nhà tuyển dụng</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </form>

    <!-- Nút đăng nhập cho nhà tuyển dụng -->
    <div class="mt-3 text-center">
        <a href="{{ route('login_employer') }}" class="btn btn-secondary">Đăng nhập</a>
    </div>
</div>
@endsection
