@extends('layout')
@section('page','Bảng giá')
@section('title','Bảng giá - Nhập hàng china')
@section('content-page')
<div class="blog-list">
                <h1 style="text-align: center;margin:0 10px 15px 10px;">Bảng giá dịch vụ đặt hàng và vận chuyển</h1>
                <div class="contentx">
                    <div class="col-md-10 col-md-offset-1">
                        <p style="text-align:justify">Bảng giá dịch vụ đặt hàng của&nbsp;<strong>Đặt hàng China</strong>&nbsp;được tính dựa trên tổng giá trị đơn hàng, mỗi mốc giá trị khác nhau sẽ có mức phí dịch vụ khác nhau, áp dụng cho cả đơn đặt hàng Trung Quốc và Hàn Quốc. Cụ thể như sau:</p>
                        <p><strong>Giá (về tận nhà HN hoặc SG) =&nbsp;(Giá sản phẩm + Giá VC nội địa) * Tỉ giá tệ/won + % Phí dịch vụ đặt hàng + Phí VC</strong><br>
                            Trong đó:<br>
                            - Giá sản phẩm, tiền vận chuyển (VC)&nbsp;nội địa: Thanh toán trực tiếp cho shop TQ/HQ, giá VC nội địa dao động và do các shop quy định, cũng có shop miễn phí VC.<br>
                            - Tỉ giá tệ/won: Tính tại thời điểm đặt đơn hàng và có thể dao động.<br>
                            - Phí dịch vụ: % phí đặt hàng được tính dựa trên tổng giá trị đơn hàng và các mức quy định sẵn, đơn hàng giá trị càng lớn, % phí dịch vụ càng thấp,&nbsp;ngoài ra có thể có phụ phí&nbsp;với một số mặt hàng đặc biệt (Chi tiết xem bảng giá dưới đây).<br>
                            - Phí vận chuyển: Phí vận chuyển được tính sau khi hàng về VN, cân lên và tính phí VC. Phí này cũng được tính theo các mốc, tổng cân nặng của kiện hàng càng cao thì đơn giá phí VC càng thấp.&nbsp;Bảng giá vận chuyển có thể thay đổi nên giá vận chuyển sẽ được tính theo mức giá tại thời điểm hàng về Việt Nam.&nbsp;<br>
                        Riêng phí VC sẽ thanh toán sau khi hàng về, còn lại sẽ tính và thanh toán trước khi đặt hàng.</p>
                        <p><strong>A. Bảng giá phí dịch vụ</strong></p>
                        <p style="margin-left:40px">&nbsp;</p>
                        <table align="center" border="1" cellpadding="5" cellspacing="1" style="width:500px">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="text-align:center"><strong>Bảng giá phí dịch vụ</strong></td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng &lt;2tr</td>
                                    <td style="text-align:center">10%</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng trên 2 - 5tr</td>
                                    <td style="text-align:center">7%</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng trên 5 - 50tr</td>
                                    <td style="text-align:center">5%</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng trên 50 - 100 tr</td>
                                    <td style="text-align:center">4%</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng trên 100 - 300tr</td>
                                    <td style="text-align:center">2%</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng trên 300 - 500tr</td>
                                    <td style="text-align:center">1%</td>
                                </tr>
                                <tr>
                                    <td>Đơn hàng &gt;500tr</td>
                                    <td style="text-align:center">0.5%</td>
                                </tr>
                            </tbody>
                        </table>
                        <p><em><strong>Phụ phí phát sinh cụ thể như sau:</strong></em></p>
                        <p>- Phụ phí 4% giá trị đơn hàng áp dụng với đơn hàng có giá trị trung bình của mỗi SP dưới 5 tệ (Gọi chung đơn hàng phụ kiện nhỏ)</p>
                        <p>- Phụ phí 5% giá trị đơn hàng áp dụng cho những mặt hàng dễ vỡ (hàng thủy tinh, gốm sứ, đồ nhựa, ... )</p>
                        <p>&nbsp;</p>
                        <p style="text-align:justify"><strong>B. Bảng giá vận chuyển (Cập nhật ngày 10/8/2017)</strong></p>
                        <p style="text-align:justify">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                        <table align="center" border="1" cellpadding="5" cellspacing="1" style="width:500px">
                            <tbody>
                                <tr>
                                    <td colspan="3" style="text-align:center"><strong>Giá vận chuyển TQ - VN</strong></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center">Khối lượng</td>
                                    <td style="text-align:center">Hà Nội&nbsp;</td>
                                    <td style="text-align:center">Sài Gòn</td>
                                </tr>
                                <tr>
                                    <td>1 - 5 kg</td>
                                    <td style="text-align:center">30.000/kg</td>
                                    <td style="text-align:center">39.000/kg</td>
                                </tr>
                                <tr>
                                    <td>5 - 20 kg</td>
                                    <td style="text-align:center">28.000/kg</td>
                                    <td style="text-align:center">37.000/kg</td>
                                </tr>
                                <tr>
                                    <td>&gt;20 kg</td>
                                    <td style="text-align:center">24.000/kg</td>
                                    <td style="text-align:center">33.000/kg</td>
                                </tr>
                                <tr>
                                    <td>&gt;200 kg</td>
                                    <td style="text-align:center">22.000/kg</td>
                                    <td style="text-align:center">31.000/kg</td>
                                </tr>
                                <tr>
                                    <td>Hàng nặng</td>
                                    <td style="text-align:center">15.000/kg</td>
                                    <td style="text-align:center">24.000/kg</td>
                                </tr>
                                <tr>
                                    <td>Chuyển hàng khối</td>
                                    <td style="text-align:center">2.600.000/khối</td>
                                    <td style="text-align:center">4.000.000/khối</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <table align="center" border="1" cellpadding="5" cellspacing="1" style="width:500px">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="text-align:center"><strong>Giá vận chuyển HQ - VN</strong></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center">Khối lượng</td>
                                    <td style="text-align:center">Hà Nội &amp; Sài Gòn</td>
                                </tr>
                                <tr>
                                    <td>1 - 3 kg</td>
                                    <td style="text-align:center">230.000/kg</td>
                                </tr>
                                <tr>
                                    <td>3 - 20 kg</td>
                                    <td style="text-align:center">215.000/kg</td>
                                </tr>
                                <tr>
                                    <td>&gt;20 kg</td>
                                    <td style="text-align:center">195.000/kg</td>
                                </tr>
                                <tr>
                                    <td>&gt;200 kg</td>
                                    <td style="text-align:center">185.000/kg</td>
                                </tr>
                                <tr>
                                    <td>Chuyển chậm (30-35 ngày)</td>
                                    <td style="text-align:center">95.000/kg</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <p style="text-align:justify"><u>Lưu ý:</u></p>
                        <p style="text-align:justify"><em><strong>1. Mức tính phí VC tối thiểu</strong></em></p>
                        <p>- Đối với hàng hóa vận chuyển TQ – VN: Mức thấp nhất được tính là 2 kg (các kiện hàng nhỏ hơn 2 kg sẽ được làm tròn tới 2 kg để tính phí cho mỗi đơn hàng).&nbsp;</p>
                        <p>- Đối với hàng hóa vận chuyển HQ – VN: Với kiện hàng có khối lượng dưới 1 kg sẽ được tính theo các mốc 0.3 kg, 0.6 kg hoặc 1 kg, làm tròn lên tới mốc gần nhất.</p>
                        <p style="text-align:justify">- Khi nhận hàng quý khách cần kiểm tra đủ số kiện, cân nặng và ký nhận đối với nhân viên giao hàng. Sau khi ký nhận chúng tôi sẽ không nhận thắc mắc về số kiện và cân nặng của lần giao hàng đó.</p>
                        <p style="text-align:justify">-&nbsp;Giá cước vận chuyển: &nbsp;Giá cước vận chuyển được tính tại thời điểm hàng xuất kho tại VN nên có thể sẽ thay đổi theo giá thị trường tại thời điểm đó.</p>
                        <p><em><strong>2. Quy định về vận chuyển đối với hàng hàng cồng kềnh</strong></em></p>
                        <p>Áp dụng đối với các mặt hàng có khối lượng nhẹ thể tích lớn</p>
                        <p><em>Trọng lượng quy đổi = Chiều dài (cm) * Chiều rộng&nbsp;(cm)* Chiều cao (cm)&nbsp;/6000</em></p>
                        <p>Nếu khối lượng &gt; hoặc = trọng lượng quy đổi: Tính giá vận chuyển theo khối lượng</p>
                        <p>Nếu khối lượng &lt; trọng lượng quy đổi: Tính giá vận chuyển theo trọng lượng quy đổi</p>
                        <p><em><strong>3. Quy định đối với giao hàng trong nội thành Hà Nội và TP. Hồ Chí Minh</strong></em></p>
                        <p>Chúng tôi thực hiện giao hàng miễn phí cho quý khách ở khu vực nội thành Hà Nội và Hồ Chí Minh cụ thể như sau:</p>
                        <p>- Hà Nội: Hai Bà Trưng, Thanh Xuân, Hoàn Kiếm, Ba Đình, Cầu Giấy, Đống Đa, Hoàng Mai</p>
                        <p>- Hồ Chí Minh: Quận 1-8, Quận&nbsp;10, 11, Tân Bình, Tân Phú, Bình Thạnh, Gò Vấp, Phú Nhuận</p>
                        <p>Khách hàng nằm ngoài các khu vực này, vui lòng tới chi nhánh nhận hàng hoặc chuyển hàng chịu phí.</p>
                        <p><u><em>Lưu ý:&nbsp;</em></u></p>
                        <p>- Chúng tôi chỉ áp dụng giao hàng đến chân các tòa nhà cao tầng, chung cư,...&nbsp;</p>
                        <p>- Khi đến giao hàng: thời gian đợi nhận hàng là 10 phút từ khi thông báo hàng đã đến.&nbsp;Quá thời gian trên, quý khách vui lòng đến các chi nhánh để nhận hàng hoặc giao hàng có thu phí (phí cụ thể sẽ được thông báo trong mỗi trường hợp).</p>
                        <p><em><strong>4. Quy định đối với giao hàng ngoại thành Hà Nội, TP. Hồ Chí Minh và đi tỉnh</strong></em></p>
                        <p>Hiện tại để đảm bảo vấn đề hàng hóa chúng tôi thực hiện hình thức chuyển phát nhanh qua Viettel Post.</p>
                        <p>Có 2 hình thức chuyển phát nhanh và chuyển phát chậm: Tùy từng mặt hàng nhân viên chúng tôi sẽ tư vấn để quý khách lựa chọn hình thức phù hợp hơn. Phí VC được thanh toán trước và tính theo biểu phí hàng hoá của Viettel Post.</p>
                        <p>Đối với hình thức chuyển xe: Chúng tôi chỉ áp dụng chuyển xe đối với các nhà xe do khách hàng cung cấp và không đảm bảo hàng hóa toàn vẹn và không mất mát&nbsp;trong quá trình chuyển.&nbsp;Phí vào bến 20,000/lần chuyển.&nbsp;</p>
                        <p><em><strong>5. Thời gian chuyển hàng</strong></em></p>
                        <p>- Các đơn hàng thông thường sẽ tới HN sau 7 – 10 ngày, tới TP. Hồ Chí Minh sau 9 – 12 ngày. Tuy nhiên với các mặt hàng chứa pin, hoá chất, nước,… do không chuyển theo đường nhanh nên sẽ tới HCM chậm trễ hơn từ 2 – 5 ngày.&nbsp;Thời gian chuyển chậm áp dụng với hàng Hàn Quốc là 30 - 35 ngày (mỗi tháng chỉ có 2 đợt chuyển hàng chậm).</p>
                        <p>- Trường hợp hàng về chậm do thiên tai, thất lạc, thủ tục hải quan....: Đây là lý do khách quan công ty chúng tôi không hề mong muốn. Nhưng với tinh thần hỗ trợ khách hàng tối đa có thể, nếu quá 30 ngày quy định quý khách chưa nhận được hàng hóa chúng tôi sẽ bồi hoàn 100% giá trị hàng hóa (nếu khách không nhận hàng) hoặc giảm giá từ 20-50% giá trị hàng hóa (nếu khách nhận hàng).</p>
                        <p style="text-align:justify">&nbsp;</p>
                    </div>
                </div>
            </div>
@endsection