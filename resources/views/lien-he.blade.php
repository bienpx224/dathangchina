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
                <span>Liên hệ </span>
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
                <h1 class="article-title">Liên hệ</h1>
                <div class="block-date-time">
                    <span class="date">24-11-2017</span>
                    <ul class="share">
                        <li class="facebook"><div id="fb-root" class=" fb_reset"><div class="fb-like fb_iframe_widget" data-href="http://www.nhaphang247.com/lien-he?title=lien-he" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=199344773551690&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Flien-he%3Ftitle%3Dlien-he&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true"><span style="vertical-align: bottom; width: 84px; height: 20px;"><iframe name="f15811d8d78395c" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/like.php?action=like&amp;app_id=199344773551690&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df1988129d81eec%26domain%3Dwww.nhaphang247.com%26origin%3Dhttp%253A%252F%252Fwww.nhaphang247.com%252Ff15899cb2ed794c%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Flien-he%3Ftitle%3Dlien-he&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true" style="border: none; visibility: visible; width: 84px; height: 20px;" class=""></iframe></span></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=f15899cb2ed794c&amp;origin=http%3A%2F%2Fwww.nhaphang247.com" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/lY4eZXm_YWu.js?version=42#channel=f15899cb2ed794c&amp;origin=http%3A%2F%2Fwww.nhaphang247.com" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div></li>
                        <li class="facebook-share"><div id="fb-root"><div class="fb-share-button fb_iframe_widget" data-href="http://www.nhaphang247.com/lien-he?title=lien-he" data-layout="button_count" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=199344773551690&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Flien-he%3Ftitle%3Dlien-he&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 94px; height: 20px;"><iframe name="f34a91f9d76b0e8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:share_button Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/share_button.php?app_id=199344773551690&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FlY4eZXm_YWu.js%3Fversion%3D42%23cb%3Df1dc2040442f654%26domain%3Dwww.nhaphang247.com%26origin%3Dhttp%253A%252F%252Fwww.nhaphang247.com%252Ff15899cb2ed794c%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.nhaphang247.com%2Flien-he%3Ftitle%3Dlien-he&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 94px; height: 20px;" class=""></iframe></span></div></div></li>
                        <li class="google"><div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 32px; height: 20px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 32px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1511667764951" name="I0_1511667764951" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;annotation=inline&amp;width=200&amp;origin=http%3A%2F%2Fwww.nhaphang247.com&amp;url=http%3A%2F%2Fwww.nhaphang247.com%2Flien-he%3Ftitle%3Dlien-he&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.CRWqul2f0Vw.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOByQQ-ItN9B1zHg98WYPcl7VNBuQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1511667764951&amp;_gfid=I0_1511667764951&amp;parent=http%3A%2F%2Fwww.nhaphang247.com&amp;pfname=&amp;rpctoken=14304587" data-gapiattached="true" title="G+"></iframe></div></li>
                    </ul>
                    <div style="clear: both"></div>
                </div>
                <div class="nh-row"></div>
                <div class="article-content">
                    <p><strong>NhapHang247</strong> sử dụng&nbsp;tổng đài liên hệ và địa chỉ chính thức như sau:</p>
                    <p><strong>1. Điện thoại liên hệ</strong></p>
                    <p><strong><em>Tổng đài:</em></strong> 0247.3000.247</p>
                    <p>Thời gian hoạt động:</p>
                    <p>8.00 - 12.00, 13.30 - 17.30, 19.00 - 22.30 (Thứ 2 - Thứ 6)</p>
                    <p>8.00 - 12.00, 13.30 - 17.30 (Thứ 7)</p>
                    <p><em><strong>Hotline:</strong></em>&nbsp;0941.077.333&nbsp;</p>
                    <p>Lưu ý: Hotline chỉ tiếp nhận <strong>phản ánh về chất lượng dịch vụ của Đặt hàng China</strong>, các trường hợp liên quan tới thắc mắc hàng hoá, kiểm tra đơn hàng, thời gian hàng về,... quý khách hàng vui lòng liên hệ qua số tổng đài, chúng tôi không giải đáp qua số hotline.</p>
                    <p>&nbsp;</p>
                    <p><strong>2. Danh sách văn phòng giao dịch</strong></p>
                    <p><em><strong>Chi nhánh Hà Nội:</strong></em></p>
                    <p>Số 12 - Ngõ 171 Minh Khai – Hai Bà Trưng – Hà Nội</p>
                    <p>Số 5 – Ngõ 282 Nguyễn Huy Tưởng – Thanh Xuân – Hà Nội</p>
                    <p><em><strong>Chi nhánh Hồ Chí Minh:</strong></em><br>
                    Số 19, Đường số 2, Cư Xá&nbsp;Đô Thành (đối diện VP cũ)&nbsp;-&nbsp;&nbsp;P4 -&nbsp;Q3 - HCM</p>
                    <p>*Lưu ý: Địa chỉ trên là văn phòng giao dịch, quý khách hàng muốn tới nhận hàng tại kho vui lòng liên hệ trực tiếp để được hướng dẫn.</p>
                    <p><em><strong>Chi nhánh Trung Quốc:</strong></em></p>
                    <p>Công ty TNHH Vận tải Trác Tiệp Bằng Tường</p>
                    <p><em>Số điện thoại:&nbsp;</em></p>
                    <p>+86-18775946520</p>
                    <p>+86-15678951926</p>
                    <p><em>Địa chỉ:</em> 319 đường Bắc Đại - Thị Xã Bằng Tường - Tỉnh Quảng Tây</p>
                    <p>凭祥卓捷市物流有限公司电话:</p>
                    <p>+86-18775946520</p>
                    <p>+86-15678951926</p>
                    <p>地址：广西凭祥市北大路319号</p>
                    <p><em><strong>Cảm ơn Quý khách!</strong></em></p>
                </div>
                <div class="article-footer">
                    <div class="prev-post">
                        <a href="/p75/tong-hop-link-order-hang-han-quoc" class="icon-prev"><i class="fa fa-chevron-left"></i> Bài trước</a>
                        <a href="/p75/tong-hop-link-order-hang-han-quoc" class="name-prev" alt="Tổng hợp link order hàng Hàn Quốc" title="Tổng hợp link order hàng Hàn Quốc">Tổng hợp link order hàng Trung Quốc</a>
                    </div>
                    <div class="next-post">
                        <a href="/gioi-thieu?title=gioi-thieu" class="icon-next">Bài sau <i class="fa fa-chevron-right"></i></a>
                        <a href="/gioi-thieu?title=gioi-thieu" class="name-next" alt="Giới thiệu" title="Giới thiệu">Giới thiệu</a>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="rela-post">
                    <div class="rela-item ">
                        <a href="/p100/7-xu-huong-duong-da-moi-cua-han-quoc-khong-the-bo-qua" alt="7 xu hướng dưỡng da mới của Hàn Quốc không thể bỏ qua" title="7 xu hướng dưỡng da mới của Hàn Quốc không thể bỏ qua"><img src="/upload/6813b5c7ce3f920487e5ffcd5f799feb_01-07-2016_23-33.jpg" class="rela-img" alt="7 xu hướng dưỡng da mới của Hàn Quốc không thể bỏ qua"></a>
                        <a href="/p100/7-xu-huong-duong-da-moi-cua-han-quoc-khong-the-bo-qua" class="rela-title" alt="7 xu hướng dưỡng da mới của Hàn Quốc không thể bỏ qua" title="7 xu hướng dưỡng da mới của Hàn Quốc không thể bỏ qua">7 xu hướng dưỡng da mới của Trung Quốc không thể bỏ qua</a>
                    </div>
                    <div class="rela-item ">
                        <a href="/p27/he-thong-cac-shop-tren-taobaocom-tmallcom-1688" alt="Hệ thống các shop trên taobao.com, tmall.com, 1688" title="Hệ thống các shop trên taobao.com, tmall.com, 1688"><img src="/upload/d39bab7388c07dadd7cea5e195fa9693_17-09-2015_23-44.jpg" class="rela-img" alt="Hệ thống các shop trên taobao.com, tmall.com, 1688"></a>
                        <a href="/p27/he-thong-cac-shop-tren-taobaocom-tmallcom-1688" class="rela-title" alt="Hệ thống các shop trên taobao.com, tmall.com, 1688" title="Hệ thống các shop trên taobao.com, tmall.com, 1688">Hệ thống các shop trên taobao.com, tmall.com, 1688</a>
                    </div>
                    <div class="rela-item last">
                        <a href="/p29/dat-hang-trung-quoc-co-hoi-va-thach-thuc" alt="Đặt hàng Trung Quốc - Cơ hội và thách thức" title="Đặt hàng Trung Quốc - Cơ hội và thách thức"><img src="/upload/b0095a16396912ab27e7797b02e21a00_20-09-2015_11-20.jpg" class="rela-img" alt="Đặt hàng Trung Quốc - Cơ hội và thách thức"></a>
                        <a href="/p29/dat-hang-trung-quoc-co-hoi-va-thach-thuc" class="rela-title" alt="Đặt hàng Trung Quốc - Cơ hội và thách thức" title="Đặt hàng Trung Quốc - Cơ hội và thách thức">Đặt hàng Trung Quốc - Cơ hội và thách thức</a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="end-post"></div>
            </div>
            @include('bloc-quick')
        </div>
    </div>
</div>
<div style="clear: both"></div>
</div>
</div>

@endsection