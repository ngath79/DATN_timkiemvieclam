@extends('home_employer')

@section('content')
<div class="container mt-4">
    <h2>Cập nhật thông tin công ty</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('update_company_employer') }}" method="POST">
        @csrf
        @foreach($edit_employer as $item)
        <div class="mb-3">
            <label for="company_name" class="form-label">Tên công ty</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $item->company_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="company_email" class="form-label">Email</label>
            <input type="text" name="company_email" id="company_email" class="form-control" value="{{ old('company_email', $item->company_email) }}">
        </div>

        <div class="mb-3">
            <label for="company_phone" class="form-label">Số điện thoại</label>
            <input type="text" name="company_phone" id="company_phone" class="form-control" value="{{ old('company_phone', $item->company_phone) }}">
        </div>

        <div class="mb-3">
            <label for="company_website" class="form-label">Website</label>
            <input type="text" name="company_website" id="company_website" class="form-control" value="{{ old('company_website', $item->company_website) }}">
        </div>

        <div class="mb-3">
            <label for="masothue_website" class="form-label">Mã số thuế</label>
            <input type="text" name="masothue_website" id="masothue_website" class="form-control" value="{{ old('masothue_website', $item->masothue_website) }}">
        </div>

        <div class="mb-3">
            <label for="loaihinhhoatdong_website" class="form-label">Loại hình hoạt động</label>
            <input type="text" name="loaihinhhoatdong_website" id="loaihinhhoatdong_website" class="form-control" value="{{ old('loaihinhhoatdong_website', $item->loaihinhhoatdong_website) }}">
        </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
