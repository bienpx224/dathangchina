@extends('index')
@section('title','Quy định đặt hàng - Nhập hàng china')
@section('content')
<div class="row main-content" id="main-content">
    <style>
    .pagination {
    margin-top: 20px;
    text-align: right;
    }
    .pagination li {
    border: 1px solid #CFD1D2 !important;
    }
    .pagination .active {
    background-color: #EDF0F4;
    }
    .blog-pages-right {
    min-height: 750px;
    min-width: 997px;
    }
    .blog-quick {
    display: inline-block !important;
    }
    .blog-pages .blog-pages-right {
    float: none !important;
    width: 100% !important;
    }
    .blog-list {
    width: 100% !important;
    padding-right: 246px !important;
    min-height: 750px;
    }
    .blog-list:after{
    right: 203px !important;
    }
    </style>
    <!-- Begin Breadcrumb -->
    <div class="nh-breadcrumb">
        <ul class="nh-breadcrumb-list">
            <li class="nh-breadcrumb-item">
                <a href="">Trang chủ</a>
            </li>
            <li class="nh-breadcrumb-item">
                <span>Giới thiệu </span>
            </li>
        </ul>
    </div>
    <!-- End Breadcrumb -->
    <span class="nh-divide"></span>
    <div style="clear: both"></div>
    <div class="blog-pages">
        <div class="blog-pages-left" id="quang-cao" style=" height: 1550px; background-image:url('public/img/quang-cao.png');">
            <div style="clear: both"></div>
        </div>
        <div class="blog-pages-right blog-page" style="margin-left: -30px;">
            <div class="blog-detail">
                <h1 class="article-title">Giới thiệu</h1>
                <div class="block-date-time">
                    <span class="date">24-11-2017</span>
                    <ul class="share">
                        <li class="facebook"><div id="fb-root" class=" fb_reset"><div class="fb-like fb_iframe_widget" data-href="http://www.nhaphang247.com/gioi-thieu?title=gioi-thieu" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=199344773551690&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Fgioi-thieu%3Ftitle%3Dgioi-thieu&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true"><span style="vertical-align: bottom; width: 84px; height: 20px;"><iframe name="f1509c808dfbf3" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/like.php?action=like&amp;app_id=199344773551690&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df3c55bafa31a04c%26domain%3Dwww.nhaphang247.com%26origin%3Dhttp%253A%252F%252Fwww.nhaphang247.com%252Ffaf674400a1dc4%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Fgioi-thieu%3Ftitle%3Dgioi-thieu&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true" style="border: none; visibility: visible; width: 84px; height: 20px;" class=""></iframe></span></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=faf674400a1dc4&amp;origin=http%3A%2F%2Fwww.nhaphang247.com" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=faf674400a1dc4&amp;origin=http%3A%2F%2Fwww.nhaphang247.com" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="f3f495e2eac6ad8" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" src="https://www.facebook.com/connect/ping?client_id=199344773551690&amp;domain=www.nhaphang247.com&amp;origin=1&amp;redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df176d80017ed0e8%26domain%3Dwww.nhaphang247.com%26origin%3Dhttp%253A%252F%252Fwww.nhaphang247.com%252Ffaf674400a1dc4%26relation%3Dparent&amp;response_type=token%2Csigned_request%2Ccode&amp;sdk=joey" style="display: none;"></iframe></div></div></div></li>
                        <li class="facebook-share"><div id="fb-root"><div class="fb-share-button fb_iframe_widget" data-href="http://www.nhaphang247.com/gioi-thieu?title=gioi-thieu" data-layout="button_count" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=199344773551690&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Fgioi-thieu%3Ftitle%3Dgioi-thieu&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 94px; height: 20px;"><iframe name="f366d0742f84ebc" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:share_button Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/share_button.php?app_id=199344773551690&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df2e954f7d30acf4%26domain%3Dwww.nhaphang247.com%26origin%3Dhttp%253A%252F%252Fwww.nhaphang247.com%252Ffaf674400a1dc4%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Fgioi-thieu%3Ftitle%3Dgioi-thieu&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 94px; height: 20px;" class=""></iframe></span></div></div></li>
                        <li class="google"><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1511831629952" name="I0_1511831629952" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;annotation=inline&amp;width=200&amp;origin=http%3A%2F%2Fwww.nhaphang247.com&amp;url=http%3A%2F%2Fwww.nhaphang247.com%2Fgioi-thieu%3Ftitle%3Dgioi-thieu&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.CRWqul2f0Vw.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOByQQ-ItN9B1zHg98WYPcl7VNBuQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1511831629952&amp;_gfid=I0_1511831629952&amp;parent=http%3A%2F%2Fwww.nhaphang247.com&amp;pfname=&amp;rpctoken=79460850" data-gapiattached="true" title="G+"></iframe></div></li>
                    </ul>
                    <div style="clear: both"></div>
                </div>
                <div class="nh-row"></div>
                <div class="article-content">
                    <p>Ngày nay, việc mua sắm hàng hóa đa quốc gia đã không còn là điều xa lạ với các doanh nghiệp, khái niệm “biên giới” đã bị xóa bỏ nhất là trong thời kì hội nhập hiện nay. Không nằm ngoài xu thế, hiện tại đặt hàng Trung Quốc&nbsp; và cụ thể là <a href="http://www.dathangchina.com/">order hàng Taobao</a>, <a href="http://www.dathangchina.com/">order hàng Hàn Quốc</a>&nbsp;đang được các doanh nghiệp đẩy mạnh,&nbsp; với mục đích tìm kiếm nguồn hàng giá rẻ, độc,&nbsp;lạ mà thị trường trong nước chưa đáp ứng được.</p>
                    <p>Chào mừng bạn đến với <strong>DatHangChina</strong>&nbsp;- Website cung cấp dịch vụ đặt hàng, thanh toán và vận chuyển hàng hoá Trung Quốc, Hàn Quốc. Vượt qua rào cản về ngôn ngữ, thanh toán, vận chuyển, chúng tôi mang đến khách hàng&nbsp;nguồn hàng đa dạng, phong phú với giá cả và chi phí thấp nhất phục vụ tối đa nhu cầu kinh doanh cũng như nhu cầu mua sắm cá nhân.<br>
                    &nbsp;</p>
                    <p style="margin-left:40px"><strong>1. Đặt hàng Trung Quốc</strong></p>
                    <p><br>
                        Chúng tôi chuyên nhận order hàng Quảng Châu trên các web Taobao.com, Tmall.com, 1688.com, Alibaba.com….và các web đặt hàng Trung Quốc, Hàn Quốc. Chúng tôi nhận hàng tại kho Bằng Tường, và tiến hành chuyển hàng về Việt Nam<br>
                    Điều đặc biệt, Chúng tôi nhận order hàng dù chỉ là 1 sản phẩm!</p>
                    <p><strong><em>Cam kết về sản phẩm</em></strong></p>
                    <p>Đơn hàng được chốt hàng ngày, sau khi khách hàng thanh toán đơn hàng sẽ được giao dịch trong vòng 24 giờ, thời gian hàng về khoảng&nbsp;từ 7&nbsp;- 10 ngày (tùy từng tỉnh/thành phố).</p>
                    <p>Miễn phí giao hàng tận nhà nội thành Hà Nội, Hồ Chí Minh với tất cả các đơn hàng cho dù đặt 1 sản phẩm.</p>
                    <p>Phí vận chuyển siêu cạnh tranh&nbsp;</p>
                    <p>Tỷ giá tệ và won cực tốt</p>
                    <p><strong><em>Quy định và chính sách</em></strong></p>
                    <p>Quý khách vui lòng xem chi tiết quy định <a href="http://www.dathangchina.com/quy-dinh-dat-hang">tại đây</a></p>
                    <p style="margin-left:40px"><strong>2. Chuyển hàng Trung Quốc</strong></p>
                    <p>Với khách hàng tự giao dịch với shop và vận chuyển qua Chúng tôi, khách hàng cần cung cấp đầy đủ mã vận đơn, số lượng, chủng loại hàng hóa, có ghi chú đầy đủ nếu là hàng dễ vỡ…</p>
                    <p>Ngoài ra, Chúng tôi có các mức phí bảo hiểm hàng hóa đi kèm</p>
                    <p>Bảo hiểm (không bắt buộc): 3 - 5% giá trị hàng</p>
                    <p>Đền bù trong trường hợp mất mát, vỡ hỏng:</p>
                    <p style="margin-left:40px">- Hàng không bảo hiểm: Giá đền bù = 5 lần phí vận chuyển của lượng hàng mất.</p>
                    <p style="margin-left:40px">- Hàng có bảo hiểm 3%: Đền bù 50% giá trị hàng mất&nbsp;</p>
                    <p style="margin-left:40px">- Hàng có bảo hiểm 4%: Đền bù 80% giá trị hàng mất</p>
                    <p style="margin-left:40px">- Hàng có bảo hiểm 5%: Đền bù 100% giá trị hàng mất</p>
                    <p>Hàng gửi về địa chỉ công ty Bằng Tường mà không email chúng tôi sẽ không chịu trách nhiệm nếu mất mát hỏng hóc</p>
                    <p>Hàng dưới 2kg sẽ được làm tròn lên mốc 2kg</p>
                    <p>Tự hào là một trong những công ty đi đầu trong lĩnh vực đặt hàng và vận chuyển hàng Trung Quốc, Hàn Quốc, NhapHang247 luôn cố gắng từng ngày để cải thiện chất lượng dịch vụ, mang lại sự hài lòng tuyệt đối cho khách hàng. Cảm ơn quý khách hàng đã tin tưởng và sử dụng dịch vụ của chúng tôi.</p>
                    <p>Trân trọng,</p>
                    <p><em><strong>DatHangChina.com</strong></em></p>
                    <p>&nbsp;</p>
                </div>


            </div>
            @include('bloc-quick')
        </div>
    </div>
</div>
<div style="clear: both"></div>
</div>
</div>
@endsection