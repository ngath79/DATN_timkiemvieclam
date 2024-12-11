@extends('home_employer')

@section('content')
<div class="container mt-5">
    <h2>Chỉnh sửa bài đăng công việc</h2>
    <form action="{{ route('update_job_employer', $jobPost->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Phương thức PUT để cập nhật -->

        <div class="mb-3">
            <label for="position" class="form-label">Vị trí tuyển dụng</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $jobPost->position }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $jobPost->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Hạn nộp</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $jobPost->deadline }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả công việc</label>
            <textarea class="form-control" id="description" name="description" required>{{ $jobPost->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="requirements" class="form-label">Yêu cầu</label>
            <textarea class="form-control" id="requirements" name="requirements" required>{{ $jobPost->requirements }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
