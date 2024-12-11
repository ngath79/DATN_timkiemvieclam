@extends('home_employer')

@section('content')
<div class="container mt-5">
    <h1>{{ $jobPost->position }}</h1>
    <p><strong>Số lượng:</strong> {{ $jobPost->quantity }}</p>
    <p><strong>Hạn nộp hồ sơ:</strong> {{ $jobPost->deadline }}</p>
    <p><strong>Mô tả công việc:</strong> {!! nl2br(e($jobPost->description)) !!}</p>
    <p><strong>Yêu cầu công việc:</strong> {!! nl2br(e($jobPost->requirements)) !!}</p>
    <p><strong>Trạng thái:</strong> {{ $jobPost->status }}</p>
    <a href="{{ route('job_manager_employer') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
