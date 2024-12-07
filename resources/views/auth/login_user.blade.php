@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Đăng nhập cho Người dùng</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login.user') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
    </form>
</div>
@endsection
