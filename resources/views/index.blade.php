<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="icon" type="image/jpg" href="http://stickersocial.net/wp-content/uploads/2014/11/NuaNia2.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="/assets/cae4bfa9/css/nh247.css?v=1477467569" rel="stylesheet">
        <link href="/assets/cae4bfa9/css/custom.css?v=1477467569" rel="stylesheet">
        <link href="/assets/cae4bfa9/css/nh-custom.css?v=1477467569" rel="stylesheet">
        <link href="/assets/cae4bfa9/css/nh-fix.css?v=1477467569" rel="stylesheet">
        <link href="/assets/5222b3ba/css/home.css?v=1474536109" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=latin,vietnamese" rel="stylesheet">
        <link href="/assets/133f920c/css/vex.css?v=1477465296" rel="stylesheet">
        <link href="/assets/133f920c/css/vex-theme-plain.css?v=1477465296" rel="stylesheet">
        <link href="/assets/c6f829cd/Loading.css?v=1474536219" rel="stylesheet">
        <link href="/assets/bb9e61ec/css/pnotify.custom.min.css?v=1474536216" rel="stylesheet">
        <link rel="stylesheet" href="{!! asset('css/mycss.css') !!}" media="all" type="text/css">
        <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/socket.io/socket.io.js"></script>
        <script type="text/javascript" src="/js/myjs.js"></script>
    </head>
    <body id="body">
        <div class="top-header" id="topHead">
            <div class="row top-header-container">
                <a href="http://www.nhaphang247.com" class="logo-top"></a>
                <div class="search-box">
                    <div class="select-site-container">
                        <div id="dd" class="list-site-container" tabindex="1">
                            <select class="selected-site">
                                <option>Tao Bao</option>
                                <option>1688(TQ)</option>
                            </select>
                            <!-- <span class="selected-site">Taobao</span>
                            <ul class="list-site notranslate">
                                <li><a href="#" title="Taobao(TQ)">Taobao<span style="float: right;">(TQ)</span></a></li>
                                <li><a href="#" title="Tmall(TQ)">Tmall<span style="float: right;">(TQ)</span></a></li>
                                <li><a href="#" title="1688(TQ)">1688<span style="float: right;">(TQ)</span></a></li>
                                <li><a href="#" title="Coupang(HQ)">Coupang<span style="float: right;">(HQ)</span></a></li>
                                <li><a href="#" title="Gmarket(HQ)">Gmarket<span style="float: right;">(HQ)</span></a></li>
                            </ul> -->
                        </div>
                    </div>
                    <input type="text" class="search-input header-search" placeholder="Nhập tên sản phẩm tiếng Việt">
                    <a href="javascript:;" class="btn-search"></a>
                </div>
                <span class="create-order" data-dropdown=".create-order-detail">
                    <a href="javascript:;" class="create-order-link" title="Tạo đơn hàng">Tạo đơn hàng</a>
                    <ul class="create-order-detail">
                        <li><a href="/tao-don-hang-trung-quoc" class="create-order-tq" target="_blank">Đặt hàng TRUNG QUỐC ( Tỷ giá: 3,455.00 )</a></li>
                        <li><a href="/tao-don-hang-han-quoc" target="_blank">Đặt hàng HÀN QUỐC ( Tỷ giá: 21.20 )</a></li>
                    </ul>
                </span>
                <span class="order-label">
                    <a href="javascript:;" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 list-order-label">Danh sách đơn hàng</a>
                </span>
                <div class="notification-block">
                    <div class="notification-block-message">
                        <a href="#" class="notification-block-message-link fa fa-comments" data-dropdown=".notification-message-details" title="Tin nhắn"></a>
                        <span id="count-chat-notify" class="alert badge" style="display: none;"></span>
                        <div class="notification-message-details">
                            <div class="details-popup-header">
                                <span class="title">Tin nhắn</span>
                                <!--<span class="view-all"><a href="/tai-khoan/tin-nhan">Xem tất cả</a></span>-->
                            </div>
                            <div class="details-popup-content">
                                <ul class="list-message">
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="notification-block-notice">
                        <a href="javascript:;" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 notification-block-notice-link" title="Thông báo"></a>
                    </div>
                    <div class="notification-block-message">
                        <a href="#" class="notification-block-feedback-link fa fa-envelope" title="Góp ý"></a>
                        <div class="notification-message-details feedback-form" style="right: -12px !important;">
                            <div class="details-popup-header">
                                <span class="title">Góp ý</span>
                            </div>
                            <div class="details-popup-content-2">
                                <p class="fb_success">Cảm ơn bạn đã đóng góp ý kiến để giúp Nhập Hàng 247 nâng cao chất lượng dịch vụ!</p>
                                <form action="#" method="post" style="margin: 13px">
                                    <div style="">
                                        <label>Số điện thoại  <span class="fb_mess_phone"></span></label>
                                        <input type="text" name="fb_phone" class="fb_phone" value="">
                                    </div>
                                    <div>
                                        <label>Nội dung  <span class="fb_mess_content"></span></label>
                                        <span class="fb-notes">(Chỉ tiếp nhận các góp ý về chất lượng dịch vụ hoặc hệ thống. Các vấn đề liên quan đơn hàng, đặt hàng xin liên hệ CSKH, các vẫn đề liên quan khiếu nại xin tạo phiếu khiếu nại trong đơn hàng. Cảm ơn quý khách!)</span>
                                        <textarea name="fb_content" class="fb_content" style="min-height: 130px"></textarea>
                                    </div>
                                    <a href="#" class="btn-feedback">
                                        Gửi
                                        <span class="loading" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
                                    </a>
                                    <a href="#" class="btn-feedback-close" style="display: none">Đóng</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" id="link-modal-sign-up" data-reveal-id="modal-signup" class="modal-signup nb-signup">Đăng ký</a>
                <div class="reveal nh-popup" id="modal-signup" data-reveal data-close-on-click="true"></div>
                <a href="javascript:;" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 nb-signup">Đăng nhập</a>
                <div class="reveal nh-popup" id="modal-signup2" data-reveal data-close-on-click="true"></div>
            </div>
        </div>
        <div class="top-navigation-container">
            <div class="row">
                <ul class="top-navigation"><li class="menu-item"><a href="http://www.nhaphang247.com">Trang chủ</a></li><li class="menu-item"><a href="/huong-dan-dat-hang">Hướng Dẫn Đặt Hàng</a></li><li class="menu-item"><a href="/quy-dinh-dat-hang">Quy Định Đặt Hàng</a></li><li class="menu-item"><a href="/bang-gia">Bảng Giá</a></li><li class="menu-item"><a href="/gioi-thieu">Giới Thiệu</a></li><li class="menu-item"><a href="http://www.nhaphang247.com/blog">Blog</a></li><li class="menu-item"><a href="/tuyen-dung">Tuyển Dụng</a></li><li class="menu-item"><a href="/lien-he">Liên Hệ</a></li></ul></div>
                <a href="#" class="home-icon"></a>    </div>
                <div class="nh-description">
                    <div class="row nh-description-container">
                        <ul class="list-description">
                            <li class="description-item-1">
                                <span class="description-item-content">
                                    <span class="description-hight-light-text">DỄ DÀNG</span>
                                    TẠO VÀ QUẢN LÝ ĐƠN HÀNG, TÌM NGUỒN HÀNG,
                                    <span class="description-hight-light-text">TƯ VẤN MIỄN PHÍ</span>
                                </span>
                            </li>
                            <li class="description-item-2">
                                <span class="description-item-content">
                                    <span class="description-hight-light-text">ĐẢM BẢO 100% </span>
                                    HÀNG HÓA, ĐỀN BÙ KHI CÓ SAI SÓT, THẤT LẠC
                                </span>
                            </li>
                            <li class="description-item-3">
                                <span class="description-item-content">
                                    GIAO HÀNG TẬN NƠI,<span class="description-hight-light-text"> NHANH CHÓNG </span>DÙ ĐƠN HÀNG <span class="description-hight-light-text">CHỈ 1 SẢN PHẨM</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                @yield('content')
                @include('footer')
            </body>
        </html>