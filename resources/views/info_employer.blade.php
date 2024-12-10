@extends('home_employer')

@section('content')
    <div class="container">
        <h2>Thông tin người tuyển dụng</h2>
        <p>Tên công ty: {{ $employer->name }}</p>
        <p>Email: {{ $employer->email }}</p>
        <!-- Hiển thị các thông tin khác của công ty -->
    </div>
@endsection