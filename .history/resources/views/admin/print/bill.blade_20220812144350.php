
         <style>

         </style>
     <img class="img-fluid" src="{{ asset('./print/img/logoDN.png') }}" alt="">
     <table>
         <tr>
             <th>Tôi yêu em</th>
         </tr>
     </table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hóa Đơn</title>

    <link rel="icon" href="img/logoDN.png">
    <link rel="stylesheet" href="{{ asset('./print/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./print/css/css/style.css') }}">
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
                <h1 class="title">Hóa đơn giá trị gia tăng</h1>
                <p>Liên 1: Lưu</p>
                <p>Ngày..... tháng..... năm 20....</p>
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
        <p><strong>Họ và tên người mua hàng:</strong><span>..........................................................</span></p>
        <p><strong>Tên đơn vị:</strong><span>..........................................................</span></p>
        <p><strong>Mã số thuế:</strong><span>..........................................................</span></p>
        <p><strong>Địa chỉ:</strong><span>..........................................................</span></p>
        <p><strong>Hình thức thanh toán:</strong><span>.........................................................</span></p>
        <p><strong>Số tài khoản:</strong><span>..........................................................</span></p>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên hàng hóa, dịch vụ</th>
                <th scope="col">ĐVT</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">#</td>
                <td class="text-center">2</td>
                <td class="text-center">3</td>
                <td class="text-center">4</td>
                <td class="text-center">5</td>
                <td class="text-center">6 = 4 x 5</td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Hàng hóa</td>
                <td>Cái</td>
                <td class="text-right">5</td>
                <td class="text-right">15.000</td>
                <td class="text-right">75.000</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Hàng hóa</td>
                <td>Cái</td>
                <td class="text-right">5</td>
                <td class="text-right">15.000</td>
                <td class="text-right">75.000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Hàng hóa</td>
                <td>Cái</td>
                <td class="text-right">5</td>
                <td class="text-right">15.000</td>
                <td class="text-right">75.000</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Hàng hóa</td>
                <td>Cái</td>
                <td class="text-right">5</td>
                <td class="text-right">15.000</td>
                <td class="text-right">75.000</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Hàng hóa</td>
                <td>Cái</td>
                <td class="text-right">5</td>
                <td class="text-right">15.000</td>
                <td class="text-right">75.000</td>
            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Hàng hóa</td>
                <td>Cái</td>
                <td class="text-right">5</td>
                <td class="text-right">15.000</td>
                <td class="text-right">75.000</td>
            </tr>
            <tr>
                <td colspan="6" class="text-center">Cộng tiền hàng</td>
            </tr>
            <tr>
                <td colspan="3">Thuế suất GTGT: 10%</td>
                <td colspan="3">Tiền thuế GTGT: 250.000 vnd</td>
            </tr>
            <tr>
                <td colspan="6"><p class="text-right">Tổng cộng tiền thanh toán: 450.000 vnd</p>
                    <p class="text-center">Bằng chữ: Mười lăm triệu đồng</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-md-4 text-center">
                <strong>Người mua hàng</strong>
                <p>(Ký, ghi rõ họ tên)</p>
            </div>
            <div class="col-md-4 text-center">
                <strong>Người bán hàng</strong>
                <p>(Ký, ghi rõ họ tên)</p>
            </div>
            <div class="col-md-4 text-center">
                <strong>Thủ trưởng đơn vị</strong>
                <p>(Ký, ghi rõ họ tên)</p>
            </div>
            <div class="col-md-12 text-center mgt-50">
                <small>(Cần kiểm tra, đối chiếu, giao nhận hóa đơn)</small>
            </div>
        </div>
    </div>

</div>
</body>
</html>
