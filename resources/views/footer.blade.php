<div class="footer-block">
    <div class="row footer-container" style="margin-left: 30px;">
        <div class="footer-block-contact">
            <span class="footer-block-title" style="margin-bottom: 20px">Liên hệ</span>
            <div class="footer-block-content">
                <p class="hot-line">
                    <span>Hotline: </span>0246.3261.808
                    <span class="email">Email hỗ trợ: dathangchina88@gmail.com</span>
                </p>
                <div  class="block-address">
                    <ul class="address-list">
                        <li>
                            <span class="address"> Ngõ 6 Phố Đặng Văn Ngữ, Phương Liên, Đống Đa, Hà Nội</span><br>
                            <br>
                            <br>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="footer-block-account-info">
            <span class="footer-block-title">Tỷ giá hiện tại</span>
            <div class="exchange-rate" style="float: left; clear: both;">
                <!--                        <span style="font-weight: 500;color: #4f4f4f;display: block">Tỷ giá hiện tại:</span>-->
                <span style="display: block">Trung Quốc: <span style="color: #C44853;font-weight: 500"  id="yen_rate"></span></span>
                <span style="display: block">Đô la : <span style="color: #C44853;font-weight: 500" id="dola_rate"></span></span>
            </div>
            <!--                <span class="footer-block-title" style="padding-top: 20px">Thông tin tài khoản</span>-->
            <!--                <div class="footer-block-content" style="margin-top: 10px">-->
            <!--                    <div class="block-account">-->
            <!--                        <div class="block-account">-->
            <!--                            <span class="account-title" style="margin-bottom: 10px;">Chủ TK: NGUYEN TIEN DAT</span>-->
            <!--                        </div>-->
            <!--                        <span class="account-title">Vietcombank:</span>-->
            <!--                        <ul class="account-list">-->
            <!--                            <li>-->
            <!--                                <span class="account-number" style="color: #C44853;font-weight: 500">0941000006888</span>-->
            <!--                                <span class="branch">Chi nhánh Sóc Sơn - Hà Nội</span>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <span class="account-number" style="color: #C44853;font-weight: 500">0531002515796</span>-->
            <!--                                <span class="branch">Chi nhánh Hồ Chí Minh</span>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!---->
            <!--                    <div class="block-account">-->
            <!--                        <span class="account-title">BIDV:</span>-->
            <!--                        <ul class="account-list">-->
            <!--                            <li>-->
            <!--                                <span class="account-number" style="color: #C44853;font-weight: 500">12110000320222</span>-->
            <!--                                <span class="branch">Chi nhánh Hai Bà Trưng - Hà Nội</span>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!---->
            <!--                </div>-->
        </div>
        <div class="footer-block-blog">
            <span class="footer-block-title">Fan page facebook</span>
            <div class="footer-block-content">
                <a href="https://www.facebook.com/dathangchina88/"><p class="hot-line">
                    <span>Page: </span>DatHangChina
                </p></a>
                            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fdathangchina88%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=168504457034504" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

            </div>
        </div>

<div class="footer-block-cert">
    <span class="footer-block-title">Được chứng nhận</span>
    <div class="footer-block-content">
        <div class="block-cert">
            <a href="http://merchant_cert.lab.baokim.vn/chung_nhan/00000/615_NHAPHANG247_COM" target="_blank"><img src="{{ asset('public/img/cert_baokim.png') }}" /></a>
        </div>
        <div class="block-cert">
            <a href="#" target="_blank"><img src="{{ asset('public/img/bocongthuong.png') }}" /></a>
        </div>
    </div>
</div>
<span class="footer-line"></span>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#dola-rate').val(window.dola_rate + " VND");
        $('#yen-rate').val(window.yen_rate + " VND");
    });
</script>