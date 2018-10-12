@extends('layouts.master')
@section('content')
    <div class="title m-b-md">
        Chi tiết sản phẩm
    </div>

    <div class="row">

            <?php

                $cart = Session::get('cart');
            ?>
        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if(!isset($cart))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else

        <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
        @foreach($cart as $key => $flower)
            <div class="col-12">
                <div class="card text-left" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $flower['name'] }}</h5>
                        <p class="card-text text-dark">${{ $flower['price'] }}</p>
                        <p class="card-text text-dark">{{ $flower['soluong'] }}</p>
                        <a href="{{ route('delete-cart', $key) }}" class="btn btn-primary" style="float: left">Xoa</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
@endsection
