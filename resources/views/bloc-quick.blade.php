<style>
.block-post {
padding-top: 10px;
padding-right: 10px;
}
.post-title a {
color: #4f4f4f;
font-weight: 500;
width: 100%;
line-height: 20px;
display: block;
}
.post-title a:hover {
text-decoration: underline;
}
.neo {
position: fixed;
width: 195px;
top:86px;
}
.block-neo {
overflow: hidden;
}
.btn-blog-order, .install-extension-btn{
color: #434343 !important;
}
.btn-blog-order:hover, .install-extension-btn:hover{
color: #ca341f !important;
}
.install-extension-btn{
display: block;
width: 164px;
height: 35px;
text-align: center;
line-height: 35px;
border: 1px solid #ceceda;
margin-top: 5px;
box-shadow: 2px 2px 2px #888;
font-size: 13px;
}
.more-option-text{
display: block;
width: 164px;
font-style: italic;
font-size: 14px;
color: #555;
text-align: center;
font-weight: 500;
margin-top: 5px;
}
</style>
<div class="blog-quick">
  <div class="block-neo" id="block-neo" style="height: 587px;">
    <div class="create-order-quick">TẠO ĐƠN HÀNG NHANH</div>
    <a href="/tao-don-hang-trung-quoc" class="btn-blog-order order-china" title="Đặt hàng Trung Quốc">Đặt hàng qua Google Docs</a>
    <a href="/tao-don-hang-han-quoc" class="btn-blog-order order-korea" title="Đặt hàng Hàn Quốc">Tạo đơn hàng Trung Quốc</a>
    <span class="more-option-text">Hoặc</span>
    <a href="javascript:;" class="install-extension-btn" title="Cài đặt công cụ đặt hàng">Cài đặt công cụ đặt hàng</a>
    <div class="create-order-quick">TỶ GIÁ HIỆN TẠI:</div>
    <span style="display: block">Trung Quốc: <span style="color: #C44853;font-weight: 500">3,455.00</span></span>
    <div class="create-order-quick">BÀI VIẾT</div>
    <div class="footer-block-blog">
      <div class="footer-block-content">
        <div class="block-post">
          <span class="post-title"><a href="/p121/huong-dan-tinh-nang-ho-tro-dat-hang-tren-dathangchina">Hướng dẫn tính năng hỗ trợ đặt hàng trên Đặt hàng China</a></span>
        </div><div class="block-post">
        <span class="post-title"><a href="/p97/nhung-san-pham-nhap-tu-han-quoc-duoc-ua-chuong-nhat">Những sản phẩm nhập từ Trung Quốc được ưa chuộng nhất</a></span>
      </div><div class="block-post">
      <span class="post-title"><a href="/p87/loi-ich-khi-dat-mua-hang-trung-quoc-tren-taobao-tmall-coupang">Lợi ích khi đặt mua hàng trung quốc trên TAOBAO, TMALL, 1688 </a></span>
    </div>
    <div class="block-post">
      <span class="post-title"><a href="/p85/luu-y-khi-dat-hang-tren-taobaocom-1688com">Lưu ý khi đặt hàng trên taobao.com, 1688.com.</a></span>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //get heigh screen include scroll
        var B = document.body,
            H = document.documentElement,
            height

        if (typeof document.height !== 'undefined') {
            height = document.height // For webkit browsers
        } else {
            height = Math.max( B.scrollHeight, B.offsetHeight,H.clientHeight, H.scrollHeight, H.offsetHeight );
        }
      $(window).scroll(function() {
        var h = $(document).scrollTop();
        var distance = height - 1200;
        if (h > 130 && h < distance) {
          $("#block-neo").addClass("neo");
        } else {
          $("#block-neo").removeClass("neo");
        }
        // console.log("distance :"+ distance);
        // console.log("vi-tri-hien-tai: "+h);
        // console.log("height: "+height);
      });
    });
</script>