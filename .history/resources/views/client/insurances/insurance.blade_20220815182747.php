@extends('client.layouts.index')
@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('client.layouts.heropage')

    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('client/img/breadcrum23.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bảo hành</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <span>Bảo hành</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Điện Thoại</h4>
                        <p>{{ getConfigValueFromSettingTable('contact_phone') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>{{ getConfigValueFromSettingTable('addess_shop') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ Hoạt Động</h4>
                        <p>{{ getConfigValueFromSettingTable('time-online') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>{{ getConfigValueFromSettingTable('contact_email') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d931.8587539119852!2d105.85576052922892!3d20.89481095203891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135b340aa896af5%3A0x212913cd194a54f5!2zQsawdSDEkWnhu4duIFF1w6FuIEfDoW5o!5e0!3m2!1svi!2s!4v1656237919056!5m2!1svi!2s"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>DN shop phone</h4>
                <ul>
                    <li>Điện Thoại: {{ getConfigValueFromSettingTable('contact_phone') }}</li>
                    <li>Địa Chỉ: {{ getConfigValueFromSettingTable('addess_shop') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Tra cứu thông tin bảo hành</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('contact.send') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Mã bảo hành" name="insurance_id"
                            class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-4"></div>
                    <div class="col-lg-4 col-md-4">
                        <input type="submit" value="Tra cứu" class="site-btn text-white w-10" name="submit">
                    </div>
                    <div class="col-lg-4 col-md-4"></div>
                </div>
            </form>
            <div class="card">
                <h5 class="card-header">Bảo hành</h5>
                <div class="card-body">
                    <h5 class="card-title">Tên sản phẩm: Iphone</h5>
                    <p class="card-text">Tình trạng lỗi: </p>
                    <p class="card-text">Ngày bảo hành: </p>
                    <p class="card-text">Tình trạng lỗi: </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
