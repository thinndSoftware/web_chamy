<head>
    <meta charset="UTF-8">
    <title>Hóa Đơn</title>

    <link rel="icon" href="{{ asset('./print/img/logoDN.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('./print/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('./print/css/css/style.css') }}">
    <style>
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: normal;
            src: url({{ asset('./print/fonts/Roboto-Regular.ttf') }}) format('truetype');
            src: url({{ asset('./print/fonts/Roboto-Italic.ttf') }}) format('truetype');
            src: url({{ asset('./print/fonts/Roboto-Bold.ttf') }}) format('truetype');
        }
    </style>
</head>
<body>
<div class="page">
    <div class="header">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                     <img class="img-fluid" src="{{ asset('./print/img/logoDN.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6 title-in">
                <h1 class="title">Doanh Thu</h1>
                <p>Thời gian: Từ <strong>    {{ $DateTimeBeforeFormat }}     </strong> đến <strong>{{ $DateTimeAfterFormat }}</strong></p>
                <p>Liên 1: Lưu</p>
            </div>
            <div class="col-md-4">
                <h5>Mẫu số: </h5>
                <p>Ký hiệu: </p>
                <p>Số: </p>
            </div>
        </div>
    </div>
    <div class="content">
        <p><strong>Đơn vị bán hàng:</strong><span class="viethoa">Công ty TNHH Thương mại và dịch vụ thiết bị DN Phone</span></p>
        <p><strong>Mã số thuế:</strong><span></span></p>
        <p><strong>Địa chỉ:</strong><span>Quán Gánh ,Nhị Khê ,Thường Tín ,Hà Nội , Việt Nam</span></p>
        <p><strong>Điện thoại:</strong><span>0399574700</span></p>
        <p><strong>Số tài khoản</strong><span>19910000748627 tại Ngân hàng BIDV Hồng Hà Hà Nội</span></p>
        <div class="gach"></div>
        <div class="gach mgb-10"></div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Ngày</th>
                <th scope="col">Tên Hàng</th>
                <th scope="col">Tiền Thuế </th>
                <th scope="col">Tiền CK</th>
                <th scope="col">Thẻ Giảm Giá</th>
                <th scope="col">Tiền CK HĐ</th>
                <th scope="col">Phải Thu</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($reports as$report )

                @endforeach
            <tr>
                <th scope="row">28/8</th>
                <td>Iphone 13 promax</td>
                <td> 250.000d</td>
                <td class="text-right">29.000.000</td>
                <td class="text-right">0</td>
                <td class="text-right">0</td>
                <td class="text-right">29.000.000</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-md-4 text-center">
                <strong></strong>
                <p></p>
            </div>
            <div class="col-md-4 text-center">
                <strong></strong>
                <p></p>
            </div>
            <div class="col-md-4 text-center">
                <p>Ngày..... tháng..... năm 20....</p>
                <strong>Người Lập Báo Cáo</strong>
                <p>(Ký, ghi rõ họ tên)</p>
            </div>
        </div>
    </div>

</div>
</body>
</html>
