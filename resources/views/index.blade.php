<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="gbk" />
        <meta name="renderer" content="webkit"/>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{{ asset('public/img/logo.png') }}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=latin,vietnamese" rel="stylesheet">

        <link href="{{asset('public/assets/cae4bfa9/css/nh247.css?v=1477467569') }}" rel="stylesheet">
        <link href="{{asset('public/assets/cae4bfa9/css/custom.css?v=1477467569') }}" rel="stylesheet">
        <link href="{{asset('public/assets/cae4bfa9/css/nh-custom.css?v=1477467569') }}" rel="stylesheet">
        <link href="{{asset('public/assets/cae4bfa9/css/nh-fix.css?v=1477467569') }}" rel="stylesheet">
        <link href="{{asset('public/assets/5222b3ba/css/home.css?v=1474536109') }}" rel="stylesheet">
        <link href="{{asset('public/assets/268b8a2f/css/blog.css?v=1474536058') }}" rel="stylesheet">
        <link href="{{asset('public/assets/133f920c/css/vex.css?v=1477465296') }}" rel="stylesheet">
        <link href="{{asset('public/assets/133f920c/css/vex-theme-plain.css?v=1477465296') }}" rel="stylesheet">
        <link href="{{asset('public/assets/c6f829cd/Loading.css?v=1474536219') }}" rel="stylesheet">
        <link href="{{asset('public/assets/bb9e61ec/css/pnotify.custom.min.css?v=1474536216') }}" rel="stylesheet">
        <link href="{{asset('public/assets/account.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/css/mycss.css') }}" media="all" type="text/css">
        <link rel="stylesheet" href="{{ asset('public/inspinia/css/plugins/toastr/toastr.min.css') }}" media="all" type="text/css">



        <script type="text/javascript" src="{{asset('public/js/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{asset('public/socket.io/socket.io.js') }}"></script>
        <script type="text/javascript" src="http://cdn.howcode.org/content/static/javascript/jquery.min.js"></script>
        <script src="{{asset('public/jqueryloading/src/loadingoverlay.js') }}"></script>
        <script src="{{asset('public/jqueryloading/src/loadingoverlay.min.js') }}"></script>
        <script src="{{asset('public/inspinia/js/plugins/toastr/toastr.min.js') }}"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        @if(Session::has('loginfailed'))
          <script>
          $(function() {
              $('#LogInModal').modal('show');
          });
          </script>
        @endif
        @if(count($errors) > 0)
          <script>
          $(function() {
              $('#SignUpModal').modal('show');
          });
          </script>
        @endif
        @if (Session::has('signupsuccess'))
          <script type="text/javascript">
            alert('{{Session::get('signupsuccess')}}')
          </script>

        @endif
    </head>
    <body id="body">
        <div class="top-header" id="topHead">
            <div class="row top-header-container">
                <a href="http://www.dathangchina.com" class="logo-top"
                 style="background: url('public/img/logo.png') no-repeat; height: 55px; margin-top:-15px; "></a>
                <div class="search-box">
                    <div class="select-site-container">
                        <div id="dd" class="list-site-container" tabindex="1">
                            <select id="select" class="selected-site">
                                <option name="Tao Bao">Tao Bao</option>
                                <option name="1688">1688</option>
                                <option name="Tmall">Tmall</option>
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
                    <input type="text" id="search-input" class="search-input header-search" placeholder="Nhập tên sản phẩm tiếng Việt" name="search">
                    <a href="javascript:;" class="btn-search" id="btn-search"></a>
                </div>
                <span class="create-order" data-dropdown=".create-order-detail">
                    <a href="javascript:;" class="create-order-link" title="Tạo đơn hàng">Tạo đơn hàng</a>
                    <ul class="create-order-detail">
                        <li><a href="{!! url('/tao-don-hang-trung-quoc') !!}" class="create-order-tq" target="_blank">Đặt hàng TRUNG QUỐC ( Tỷ giá: 3,455.00 )</a></li>
                    </ul>
                </span>
                <span class="order-label">
                    <a href="javascript:;" id="link-modal-login" data-reveal-id="modal-signup2" class="modal-signup2 list-order-label">Danh sách đơn hàng</a>
                </span>
                <div class="notification-block">
                    <div class="notification-block-message">
                        <a href="#" class="notification-block-message-link " data-dropdown=".notification-message-details" title="Tin nhắn"></a>
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
                        <a href="#" class="notification-block-feedback-link " title="Góp ý"></a>
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
{{--THUONG--}}
              @if (Auth::check())
                  <ul class="nav navbar-nav navbar-right" style="position:  relative;margin: -10px 0px 0px 0px;">
                        <li class="dropdown" >
                            <a class="dropdown-toggle" data-toggle="dropdown" id="menu1">
                                <span class="glyphicon glyphicon-user" ></span>
                                <strong>{{ Auth::user()->phonenumber }}</strong>
                                <span class="glyphicon glyphicon-chevron-down" ></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="width: 307px; z-index: 99999;">
                                @if(Auth::user()->authority > 1)
                                <li>
                                <a href="{{route('admin.index')}}">
                                    Trang quản lý
                                    <span class="glyphicon glyphicon-list-alt pull-right"></span>
                                </a>
                                </li>
                                <li class="divider"></li>
                                @endif
                                <li>
                                    <a href="{{route('user-information')}}">
                                        Thông tin cá nhân
                                        <span class="glyphicon glyphicon-list-alt pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{route('danhsachdonhang')}}">
                                        Danh sách đơn hàng
                                        <span class="glyphicon glyphicon-shopping-cart pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{route('user-information')}}">
                                        Chi tiết giao dịch
                                        <span class="glyphicon glyphicon-folder-open pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{route('change-password')}}">
                                        Thay đổi mật khẩu
                                        <span class="glyphicon glyphicon-retweet pull-right"></span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('/logout') }}">Sign Out
                                        <span class="glyphicon glyphicon-log-out pull-right"></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
              @else
                <a data-toggle="modal" href="#LogInModal">Đăng nhập</a>
                <div class="modal fade" id="LogInModal" role="dialog">
                  @include('auth/login')
                </div>
                <a data-toggle="modal" href="#SignUpModal">Đăng ký</a>
                <div class="modal fade" id="SignUpModal" role="dialog">
                  @include('auth/signup')
                </div>
              @endif
{{--END THUONG--}}
        </div>
    </div>
        <div class="top-navigation-container" style="z-index: 9;">
            <div class="row">
                <ul class="top-navigation">
                    <li class="menu-item"><a href="{!! url('/') !!}">Trang chủ</a></li>
                    <li class="menu-item"><a href="https://docs.google.com/forms/d/e/1FAIpQLSdDM98Wvx3o5LWUrUh2sPEhnmCMiMY4SrO0F6bzapGWb680Sw/viewform?fbzx=-5026310265268122000">Đặt hàng qua Google Docs</a></li>
                    <li class="menu-item"><a href="{!! url('/huong-dan-dat-hang') !!}">Hướng Dẫn Đặt Hàng</a></li>
                    <li class="menu-item"><a href="{!! url('/quy-dinh-dat-hang') !!}">Quy Định Đặt Hàng</a></li>
                    <li class="menu-item"><a href="{!! url('/bang-gia') !!}">Bảng Giá</a></li>
                    <li class="menu-item"><a href="{!! url('/gioi-thieu') !!}">Giới Thiệu</a></li>
                    <li class="menu-item"><a href="{!! url('/tuyen-dung') !!}">Tuyển Dụng</a></li>
                    <li class="menu-item"><a href="{!! url('/lien-he') !!}">Liên Hệ</a></li>
                </ul>
            </div>
            <a href="{!! url('/') !!}" class="home-icon"></a>
        </div>
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
      </div>
            @yield('content')
            @include('footer')
        </body>
        <script type="text/javascript">
            $(document).ready( ()=>{
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                // window.server_url = 'http://dathangchina.com';
                window.server_url = 'http://localhost/dathangchina';

                $.ajax({
                    type: "post",
                    url: '{!! url("getAllRate") !!}',
                    dataType: 'text',
                    data : {
                      _token: CSRF_TOKEN
                    },
                    xhrFields: {
                        withCredentials: false
                    },
                    beforeSend: function() {
                    },
                    success : function(data) {
                        data = JSON.parse(data);
                        var configs = data.configs;
                        for( var i=0; i<configs.length; i++){
                            if(configs[i].type == 'yen'){
                                $('#yen_rate').text(configs[i].rate + " VND");
                                window.yen_rate = ""+configs[i].rate;
                            }
                            if(configs[i].type == 'dola'){
                                $('#dola_rate').text(configs[i].rate + " VND");
                                window.dola_rate = ""+configs[i].rate;
                            }
                        }
                    },
                    error : function (data) {
                        console.log("err getAllRate ");

                    },
                    complete: function() {
                    }
                });

                $('#search-input').on('keyup', function(e){
                    if(e.keyCode == 13){
                        searchWithInput();
                    }
                });


                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $("#btn-search").click( ()=>{
                    searchWithInput();
                })

                function searchWithInput(){
                    let text = $("#search-input").val();
                    let option = $("#select").val();
                    $.ajax({
                        type: "POST",
                        url: "{!! url('translate') !!}",
                        data: {text: text, _token: CSRF_TOKEN},
                        success: function(data) {
                            var winpop;
                            if(option === "Tao Bao")
                            winpop = window.open("https://world.taobao.com/search/search.htm?_input_charset=utf-8&q="+data+"");
                            if(option === "1688")
                            winpop = window.open("https://s.1688.com/selloffer/offer_search.htm?keywords="+data+"");
                            if(option === "Tmall")
                            winpop = window.open("https://list.tmall.com/search_product.htm?q="+data+"");

                            if(!winpop || winpop.closed){
                                alert("Vui lòng cho phép trình duyệt mở popup ở trên thanh công cụ");
                            }else{
                                console.log("ok");
                            }
                        },
                        failure: function(data){
                            alert("fail");
                        }
                    });
                }
            });
        </script>

        <script type="text/javascript" src="{{asset('public/js/myjs.js') }}"></script>
    </html>
