<?php
    use App\Http\Controllers\FlowerController;
?>
@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Danh sách sản phẩm
    </div>

    <div class="row">

        <!-- Kiểm tra biến $products được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại hoặc có số lượng băng 0 (không có sản phẩm nào) thì hiển thị thông báo -->
        <?php
        $flowers = \App\flowermodel::all();
        ?>
        @if(!isset($flowers) || count($flowers) === 0)
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $products tồn tại thì hiển thị sản phẩm -->
            @foreach($flowers as $key => $flower)
                <div class="col-4">
                    <div class="card text-left" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $flower->name }}</h5>
                            <p class="card-text">{{ $flower->auth }}</p>
                            <p class="card-text text-dark">${{ $flower->price }}</p>
                            <p class="card-text text-danger">Số lượt xem: {{ $flower->view_count }}</p>

                            <!-- Nút XEM chuyển hướng người dùng sang trang chi tiết -->
                            <a href="{{ route('show', $flower->id) }}" class="btn btn-primary">Xem</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <a href="{{ route('home') }}" style="color: black; font-size: 24px; margin-top: 50px">Home</a>
        <a href="{{ route('cart') }}"><img src="/resources/views/image/cart.png" style="height: 30px; width: 30px; margin-top: 50px; margin-left: 30px"> </a>
    </div>
@endsection