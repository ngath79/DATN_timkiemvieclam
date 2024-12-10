@extends('home_employer')

@section('content')
    <div class="container">
        <h2>Thông tin công ty</h2>
        @foreach($info_employer as $item)
        <p>Tên công ty: {{ $item->company_name }}</p>
        <p>Email: {{ $item->company_email }}</p>
        <p>Số điện thoại: {{ $item->company_phone }}</p>
        <p>Website: {{ $item->company_website }}</p>    
        <p>Mã số thuế: {{ $item->masothue_website }}</p>    
        <p>Địa chỉ: {{ $item->loaihinhhoatdong_website }}</p>    
        <p>Trang thái: <span class="status">{{ $item->trangthai_website }}</span></p>    
        @endforeach
        <!-- Hiển thị các thông tin khác của công ty -->
    </div>

    <a href="{{ route('edit_company_employer') }}" class="btn btn-primary edit_info_company">Cập nhật</a>
@endsection