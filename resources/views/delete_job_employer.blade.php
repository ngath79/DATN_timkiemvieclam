@extends('home_employer')

@section('content')
    <div class="container mt-5">
        <h2>Xóa Công Việc</h2>

        <form action="{{ route('job.destroy', $jobPost->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <p>Bạn có chắc chắn muốn xóa công việc "{{ $jobPost->position }}" không?</p>

            <button type="submit" class="btn btn-danger">Xóa</button>
            <a href="{{ route('job_manager_employer') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
