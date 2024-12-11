@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <p>Đón lấy thành công với</p>
            <h2>99++++ cơ hội nghề nghiệp!</h2>
            
            @guest
            <ul class="home_apply">
                <li class="home_apply_item">
                    <div class=" search-container search-box ">
                        <input type="text" class="search-input" placeholder="Tìm kiếm...">
                        <a href="{{ route('login.form') }}" class="btn btn-primary m-2">Ứng tuyển</a>
                    </div>    
                </li>
                <li>
                    <span class="home_box ">
                        <span>Tìm kiếm công việc phù hợp để ứng tuyển ngay!</span>
                        <a href="{{ route('register.user') }}" class="btn btn-success m-2">Tìm việc ngay</a>
                    </span>    
                </li>
            </ul>  
    
            @else
                <p>Chào mừng, {{ Auth::user()->name }}! Bạn đã đăng nhập.</p>
            @endguest
        </div>
        <div class="col-md-8 text-center">
            <h2 class="employer_home">Nhà tuyển dụng hàng đầu</h2>
            <ul class="img_employer_list">
                <li class="img_employer_item">
                <img class="img_employer_home" src="{{asset('img/Navi.jpg')}}" alt="">
                </li>
                <li class="img_employer_item">
                <img class="img_employer_home" src="{{asset('img/Navi.jpg')}}" alt="">
                </li>
                <li class="img_employer_item">
                <img class="img_employer_home" src="{{asset('img/Navi.jpg')}}" alt="">
                </li>
                <li class="img_employer_item">
                <img class="img_employer_home" src="{{asset('img/Navi.jpg')}}" alt="">
                </li>
                <li class="img_employer_item">
                <img class="img_employer_home" src="{{asset('img/Navi.jpg')}}" alt="">
                </li>
            </ul>


            
        </div>
    </div>
</div>
@endsection
