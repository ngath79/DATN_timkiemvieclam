@extends('home_employer')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tạo Bài Đăng Tuyển Dụng</h1>
    <form action="{{ route('job.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="position" class="form-label">Vị trí tuyển dụng</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Nhập vị trí tuyển dụng" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng cần tuyển" required>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Hạn nộp hồ sơ</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả công việc</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Nhập mô tả công việc" required></textarea>
        </div>

        <div class="mb-3">
            <label for="requirements" class="form-label">Yêu cầu công việc</label>
            <textarea class="form-control" id="requirements" name="requirements" rows="5" placeholder="Nhập yêu cầu công việc" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Tạo Bài Đăng</button>
        <a href="{{ route('job_manager_employer') }}" class="btn btn-secondary">Quay Lại</a>
    </form>
</div>
@endsection
