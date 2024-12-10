@extends('home_employer')

@section('content')
<div class="container mt-5">
    <h1>Quản Lý Việc Làm</h1>
    <a href="{{ route('create_job_post') }}" class="btn btn-primary mb-3">Tạo Bài Đăng Mới</a>

    @if($job_posts->isEmpty())
        <p class="text-muted">Bạn chưa có bài đăng tuyển nào.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vị trí tuyển dụng</th>
                    <th>Số lượng</th>
                    <th>Hạn nộp hồ sơ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($job_posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->position }}</td>
                        <td>{{ $post->quantity }}</td>
                        <td>{{ $post->deadline }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <a href="{{ route('job.edit', $post->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('job.delete', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
