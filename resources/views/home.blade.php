@extends('index')
@section('title','Nhập hàng China - Nhanh gọn lẹ')
@section('content')
<div id="home-slide" class="orbit home-slide" role="region" data-orbit>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="width: 30%; margin-left: 0;">
      <li data-target="#myCarousel" data-slide-to="0" class="active" style="border: 1px solid #de1f1f; background-color: #de1f1f; "></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{asset('public/img/new_banner4.png')}}" alt="Los Angeles" style="width:100%;height: 420px;">
      </div>
      <div class="item">
        <img src="{{asset('public/img/new_banner1.png')}}" alt="Chicago" style="width:100%;height: 420px;">
      </div>
      <div class="item">
        <img src="{{asset('public/img/new_banner3.png')}}" alt="New york" style="width:100%;height: 420px;">
      </div>
    </div>
  </div>
  <div class="row quick-order-container">
    <i class="exchange-rate-current">Tỷ giá hiện tại: <b>Trung Quốc (3,455.00)</b></i>
    <div class="quick-order-box">
      <form action="{{route('get-link')}}" role="form" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <input type="text" class="input-link" name="linksanpham" placeholder="Nhập link sản phẩm">
        <div class="quick-order-btn-block">
          <button class="quick-order-btn" type="submit">Đặt hàng Trung Quốc</button>
        </div>
      </form>
    </div>
      <!-- <a href="http://google.com.vn">
        <div class="pull-right" style="margin: 10px 0px; cursor: pointer;">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
            <input type="text" class="input-link" name="linksanpham" disabled="true" placeholder="Đặt hàng bằng Google docs -> Click ->">
            <div class="quick-order-btn-block">
              <button  class="quick-order-btn" type="button">Đặt hàng Trung Quốc</button>
            </div>
        </div>
      </a> -->
      <!-- <a href="javascript:;" class="install-extension-btn"></a>
      <span class="more-option-text">Hoặc</span>
      <div class="reveal nh-popup" id="modal-download-chrome" data-reveal data-close-on-click="true">
        <div class="modal-header">
          <span></span>
          <a class="close-button" data-close="" aria-label="Close reveal" type="button">×</a>
        </div>
        <div class="modal-content" style="padding: 20px; float: left;">
          <span style="float: left; font-size: 18px; color: #333; line-height: 22px; margin-bottom: 10px;">Công cụ đặt hàng của NhậpHàng247.com hiện tại chỉ hỗ trợ trình duyệt Chrome, Cốc Cốc và Firefox. Bạn có thể download hai trình duyệt này bằng link dưới đây:</span>
          <span style="float: left; width: 100%;">1. <a href="http://google.com/chrome" target="_blank">Link tải Chrome</a></span>
          <span style="float: left; width: 100%;">2. <a href="https://coccoc.com/" target="_blank">Link tải Cốc Cốc</a></span>
          <span style="float: left; width: 100%;">3. <a href="https://www.mozilla.org" target="_blank">Link tải Firefox</a></span>
        </div>
      </div> -->

    <div class="quick-order-box" style="top:-70px;cursor: pointer;">
      <a href="https://docs.google.com/forms/d/e/1FAIpQLSdDM98Wvx3o5LWUrUh2sPEhnmCMiMY4SrO0F6bzapGWb680Sw/viewform?fbzx=-5026310265268122000" target="_blank">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <input type="text" class="input-link" name="linksanpham" disabled="true" placeholder="Đặt hàng bằng Google docs -> Click ->">
        <div class="quick-order-btn-block">
          <button class="quick-order-btn" type="button">Đặt hàng Trung Quốc</button>
        </div>
      </a>
  </div>
  <div class="row main-content" id="main-content" >
    <span class="homepage-divide"></span>
    <ul class="order-step">
      <li class="step-create-order">
        <span class="step-text text-above">Tạo</span>
        <span class="step-text text-below">Đơn hàng</span>
      </li>
      <li class="step-send-order">
        <span class="step-text text-above">Gửi</span>
        <span class="step-text text-below">Đơn hàng</span>
      </li>
      <li class="step-check-order">
        <span class="step-text text-above">Chúng tôi</span>
        <span class="step-text text-below">Báo giá</span>
      </li>
      <li class="step-make-payment-order">
        <span class="step-text text-above">Chốt đơn</span>
        <span class="step-text text-below">hàng</span>
      </li>
      <li class="step-confirm-order">
        <span class="step-text text-above">Thanh toán</span>
      </li>
      <li class="step-delivery-order">
        <span class="step-text text-above">Nhận hàng</span>
        <span class="step-text text-below">tại nhà</span>
      </li>
    </ul>
    <div class="origin-block" style="padding-bottom: 20px; margin-bottom: 20px; display: none">
      <span style="color: #D33319; font-size: 16px; font-weight: bold;">THÔNG BÁO:</span>
      Ngày 11/11 các website bên Trung Quốc có đợt giảm giá lớn, vì vậy NH247 sẽ làm việc cả ngày thứ 7, những đơn hàng chốt trước 15h sẽ được NH247 đặt ngay trong ngày. Trân trọng!
    </div>
    <div class="origin-block">
      <div class="origin-header">
        <span class="origin-title">
          <i>Đặt hàng từ</i>
          <a href="http://taobao.com" target="_blank"><strong>Taobao.com</strong></a>
        </span>
      </div>
      <ul class="list-category">
        <li>
          <a href="https://www.taobao.com/market/nvzhuang/index.php?spm=a21bo.7724922.8374-1.1.uNH3LP" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465468993.jpg')}}" alt="Cập nhật liên tục những mẫu thời trang mới nhất trên thế giới" />
            <span class="category-title">Thời Trang Nữ</span>
          </a>
          <a class="view-more" href="https://www.taobao.com/market/nvzhuang/index.php?spm=a21bo.7724922.8374-1.1.uNH3LP" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://www.taobao.com/market/nanzhuang/index.php" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465468984.jpg')}}" alt="Cập nhật liên tục những mẫu thời trang nam mới nhất trên thế giới" />
            <span class="category-title">Thời Trang Nam</span>
          </a>
          <a class="view-more" href="http://www.taobao.com/market/nanzhuang/index.php" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://sport.taobao.com/?spm=a214x.6760217.991146337.45.i5DMmx" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469008.jpg')}}" alt="Đồ thể thao " />
            <span class="category-title">Đồ Thể Thao</span>
          </a>
          <a class="view-more" href="http://sport.taobao.com/?spm=a214x.6760217.991146337.45.i5DMmx" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://www.taobao.com/market/nvxie/citiao/index.php?spm=a2194.7381021.1998299049.1.FFXOhu" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469014.jpg')}}" alt="Giày, Boot Nữ" />
            <span class="category-title">Giày, Boot Nữ</span>
          </a>
          <a class="view-more" href="http://www.taobao.com/market/nvxie/citiao/index.php?spm=a2194.7381021.1998299049.1.FFXOhu" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://world.taobao.com/search/search.htm?_ksTS=1441442663373_819&from=tbsearch&json=on&cna=XjOwDRoV6iMCAQ6xC0V%20I9qc&module=page&_input_charset=utf-8&s=0&navigator=all&q=%E6%89%8B%E6%9C%BA%E5%A3%B3&callback=__jsonp_cb&abtest=null" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469030.jpg')}}" alt="Vỏ, Ốp Điện Thoại" />
            <span class="category-title">Vỏ, Ốp Điện Thoại</span>
          </a>
          <a class="view-more" href="http://world.taobao.com/search/search.htm?_ksTS=1441442663373_819&from=tbsearch&json=on&cna=XjOwDRoV6iMCAQ6xC0V%20I9qc&module=page&_input_charset=utf-8&s=0&navigator=all&q=%E6%89%8B%E6%9C%BA%E5%A3%B3&callback=__jsonp_cb&abtest=null" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://world.taobao.com/search/search.htm?_ksTS=1441443131357_19&from=tbsearch&_input_charset=utf-8&navigator=all&json=on&q=%E9%93%82%E9%87%91%E7%A1%85%E8%83%B6%E7%83%98%E7%84%99%E6%A8%A1%E5%85%B7&callback=__jsonp_cb&cna=XjOwDRoV6iMCAQ6xC0V%20I9qc&abtest=null" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469035.jpg')}}" alt="Dụng cụ làm bánh" />
            <span class="category-title">Dụng Cụ Làm Bánh</span>
          </a>
          <a class="view-more" href="http://world.taobao.com/search/search.htm?_ksTS=1441443131357_19&from=tbsearch&_input_charset=utf-8&navigator=all&json=on&q=%E9%93%82%E9%87%91%E7%A1%85%E8%83%B6%E7%83%98%E7%84%99%E6%A8%A1%E5%85%B7&callback=__jsonp_cb&cna=XjOwDRoV6iMCAQ6xC0V%20I9qc&abtest=null" target="_blank">xem thêm</a>
        </li>
      </ul>
      <div class="search-block">
        <input id="search_taobao" type="text" class="origin-keyword" placeholder="Nhập tên sản phẩm tiếng Việt để tìm kiếm từ Taobao.com">
        <a href="javascript:;" id="search_taobao_btn" class="origin-search-btn" web-name="Taobao"><i class="fa fa-search"></i></a>
      </div>
    </div>
    <div class="origin-block">
      <div class="origin-header">
        <span class="origin-title">
          <i>Đặt hàng từ</i>
          <a href="http://1688.com/" target="_blank"><strong>1688.com</strong></a>
        </span>
      </div>
      <ul class="list-category">
        <li>
          <a href="http://fuzhuang.1688.com/nvzhuang?spm=a260k.635.1998214976.1.nGgvWK" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469068.jpg')}}" alt="Nhập sỉ, buôn quần áo nữ" />
            <span class="category-title">Nhập Sỉ Quần Áo Nữ</span>
          </a>
          <a class="view-more" href="http://fuzhuang.1688.com/nvzhuang?spm=a260k.635.1998214976.1.nGgvWK" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://fuzhuang.1688.com/nanzhuang?spm=a260k.635.1998214976.2.nGgvWK" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469072.jpg')}}" alt="Nhập sỉ, buôn quần áo nam" />
            <span class="category-title">Nhập Sỉ Quần Áo Nam</span>
          </a>
          <a class="view-more" href="http://fuzhuang.1688.com/nanzhuang?spm=a260k.635.1998214976.2.nGgvWK" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://fuzhuang.1688.com/xiangbao?spm=a260k.635.1998214976.5.nGgvWK" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469076.jpg')}}" alt="Túi, Ví, Balo, Vali" />
            <span class="category-title">Túi, Ví, Balo, Vali</span>
          </a>
          <a class="view-more" href="http://fuzhuang.1688.com/xiangbao?spm=a260k.635.1998214976.5.nGgvWK" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://fuzhuang.1688.com/xie?spm=a260k.635.1998214976.4.nGgvWK" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469080.jpg')}}" alt="Nhập Sỉ Giầy Nam Nữ" />
            <span class="category-title">Nhập Sỉ Giầy Nam Nữ</span>
          </a>
          <a class="view-more" href="http://fuzhuang.1688.com/xie?spm=a260k.635.1998214976.4.nGgvWK" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://jia.1688.com/?spm=a260k.635.1998214976.17.nGgvWK" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469093.jpg')}}" alt="Trang Trí Nhà Cửa" />
            <span class="category-title">Trang Trí Nhà Cửa</span>
          </a>
          <a class="view-more" href="http://jia.1688.com/?spm=a260k.635.1998214976.17.nGgvWK" target="_blank">xem thêm</a>
        </li>
        <li>
          <a href="http://plas.1688.com/?spm=a260k.635.1998214976.30.nGgvWK" class="image-link" target="_blank">
            <img src="{{asset('public/media/category_banner/1465469098.jpg')}}" alt="Nguyên vật liệu sản xuất" />
            <span class="category-title">Nguyên Vật Liệu Sản Xuất</span>
          </a>
          <a class="view-more" href="http://plas.1688.com/?spm=a260k.635.1998214976.30.nGgvWK" target="_blank">xem thêm</a>
        </li>
      </ul>
      <div class="search-block">
        <input id="search_1688" type="text" class="origin-keyword" placeholder="Nhập tên sản phẩm tiếng Việt để tìm kiếm từ 1688.com">
        <a href="javascript:;" id="search_1688_btn" class="origin-search-btn" web-name="1688"><i class="fa fa-search"></i></a>
      </div>
    </div>
    <div class="reveal nh-popup" id="modal-guide" data-reveal data-close-on-click="true" data-options="closeOnClick:false;closeOnEsc:false;" style="width: 853px;">
      <div class="modal-header">
        <span style="width: calc(100% - 60px);">
          Hướng dẫn đặt hàng
          <div style="float: right; margin-right: 10px;">
            <span style="font-size: 14px;">Không hiển thị Banner này ở những lần truy cập kế tiếp</span>
            <input id="disable-guide" type="checkbox">
          </div>
        </span>
        <a id="close-modal-guide" class="close-button" data-close="" aria-label="Close reveal" type="button">×</a>
      </div>
      <div class="modal-content" style="padding: 0px; float: left;">
        <style>.btn.btn-primary{color: #fff;background-color: #333;border-color: #333;position: absolute;bottom: 40px;right: 20px;padding: 10px 20px;}.btn.btn-primary:hover{color: #fff;background-color: #666;border-color: #666;}</style>
        <div>
          <span style="font-size: 18px; margin-left: 10px; margin-top: 20px; float: left;">Hướng dẫn tạo đơn hàng trên website Dathangchina.com</span>
          <iframe width="853" height="480" src="https://www.youtube.com/embed/y14flb37ku8?rel=0&amp;autoplay=0&amp;showinfo=0&amp;hl=vi&amp;controls=1" frameborder="0" allowfullscreen></iframe>
        </div>
        <div>
          <span style="font-size: 18px; margin-left: 10px; margin-top: 20px; float: left;">Hướng dẫn tạo đơn hàng sử dụng công cụ đặt hàng</span>
          <iframe width="853" height="480" src="https://www.youtube.com/embed/X7U7_XflzjI?rel=0&amp;autoplay=0&amp;showinfo=0&amp;hl=vi&amp;controls=1" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready( ()=>{
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $("#search_taobao_btn").click( ()=>{
          let text = $("#search_taobao").val();
          $.ajax({
              type: "POST",
              url: "{!! url('translate') !!}",
              data: {text: text, _token: CSRF_TOKEN},
              success: function(data) {
                  window.open("https://world.taobao.com/search/search.htm?_input_charset=utf-8&q="+data+"");
              },
              failure: function(data){
                  alert("fail");
              }
          });
      })

      $("#search_1688_btn").click( ()=>{
          let text = $("#search_1688").val();
          $.ajax({
              type: "POST",
              url: "{!! url('translate') !!}",
              data: {text: text, _token: CSRF_TOKEN},
              success: function(data) {
                  window.open("https://s.1688.com/selloffer/offer_search.htm?keywords="+data+"");
              },
              failure: function(data){
                  alert("fail");
              }
          });
      })
    })
  </script>
  @endsection