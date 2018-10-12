@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Chi tiết sản phẩm
    </div>

    <div class="row">

        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if(!isset($flower))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
            <div class="col-12">
                <div class="card text-left" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $flower->name }}</h5>
                        <p class="card-text">{{ $flower->auth }}</p>
                        <p class="card-text text-dark">${{ $flower->price }}</p>
                        <p class="card-text text-danger">Số lượt xem: {{ $flower->view_count }}</p>


                        <!-- Nút XEM chuyển hướng người dùng quay lại trang danh sách sản phẩm -->
                        <a href="{{ route('index') }}" class="btn btn-primary">< Quay lại </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
