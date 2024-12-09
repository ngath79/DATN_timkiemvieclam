@extends('home_employer')

@section('content')
    <div class="container">
        <h2>Thông tin công ty</h2>
        @foreach($info_employer as $item)
        <p>Tên công ty: {{ $item->company_name }}</p>
        <p>Email: {{ $item->company_email }}</p>
        <p>Email: {{ $item->company_phone }}</p>
        <p>Email: {{ $item->company_website }}</p>    
        <p>Email: {{ $item->masothue_website }}</p>    
        <p>Email: {{ $item->loaihinhhoatdong_website }}</p>    
        <p>Email: {{ $item->trangthai_website }}</p>    
        @endforeach
        <!-- Hiển thị các thông tin khác của công ty -->
    </div>
@endsection