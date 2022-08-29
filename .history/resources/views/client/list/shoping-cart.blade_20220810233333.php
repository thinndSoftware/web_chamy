@extends('client.layouts.index')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('client/img/breadcrum23.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Trang Chủ</a>
                            <a href="{{ route('product', ['id' => 5]) }}  ">Danh Mục</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản Phẩm</th>
                                    <th>Đơn Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $content)
                                    <tr>
                                        {{-- {{ dd($content) }} --}}
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset($content->options->image_path) }}" alt=""
                                                width="150rem">
                                            <h5>{{ $content->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format($content->price) }} VND
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <form action="{{ route('update_cart') }}" method="post">
                                                @csrf
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" name="cart_quantity"
                                                            value="{{ $content->qty }}">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="rowId_cart" value="{{ $content->rowId }}">
                                                <input type="submit" value="Cập nhật" name="update_qty">
                                            </form>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ number_format($content->qty * $content->price) }} VND
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('delete_cart', ['id' => $content->rowId]) }}">
                                                <span class="icon_close"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('product', ['id' => 5]) }}" class="primary-btn cart-btn">Tiếp Tục Mua Sắm</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Cập Nhật Giá Tiền</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng Số Tiền</h5>
                        <ul>
                            <li>Thành Tiền <span>{{ Cart::subtotal() }}</span></li>
                            <li>Phải Trả <span>{{ Cart::subtotal() }}</span></li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">Tiến Hành Đặt Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
