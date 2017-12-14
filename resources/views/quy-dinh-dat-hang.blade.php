 @extends('layout')
@section('page','Quy định đặt hàng')
@section('title','Quy định đặt hàng - Nhập hàng china')
@section('content-page')
<div class="blog-list">
                <h1 style="text-align: center;margin:0 10px 15px 10px;">Quy định đặt hàng</h1>
                <div class="contentx">
                    <div class="col-md-10 col-md-offset-1">
                        <p style="text-align:justify">Chào mừng bạn đến với <strong>Đặt hàng China</strong> - Website cung cấp dịch vụ đặt hàng, thanh toán và vận chuyển hộ đối với các website thương mại điện tử của Trung Quốc: order hàng Taobao, order hàng alibaba, order hàng Gmarket...&nbsp;Vượt qua rào cản về ngôn ngữ, thanh toán, vận chuyển, chúng tôi mang đến cho các bạn những nguồn hàng đa dạng, phong phú với giá cả và chi phí thấp nhất phục vụ tối đa nhu cầu kinh doanh cũng như sử dụng.</p>
                        <p style="text-align:justify">Để bắt đầu sử dụng dịch vụ, quý khách phải xác nhận đã đọc và đồng ý với các điều khoản và quy định sau:</p>
                        <p style="text-align:justify"><strong>1. Về dịch vụ Đặt hàng China</strong></p>
                        <p style="text-align:justify">Chúng tôi là đơn vị trung gian cung cấp các dịch vụ về đặt hàng, thanh toán, vận chuyển giữa khách hàng và nhà cung cấp. Giúp việc nhập hàng Trung Quốc, nhập hàng Hàn Quốc trở nên đơn giản, dễ dàng. Chúng tôi không chịu trách nhiệm về bất cứ vấn các vấn đề khác phát sinh ngoài các vấn đề kể trên. Chúng tôi không chịu trách nhiệm về các giao dịch nào ngoài hệ thống hoặc giao dịch sử dụng thương hiệu mà chưa được sự đồng ý của Đặt hàng China.</p>
                        <p style="text-align:justify"><em><strong>1.1. Các mặt hàng không nhận đặt và vận chuyển</strong></em></p>
                        <p style="text-align:justify">-&nbsp;Ma túy, các chất gây nghiện, thuốc kích thích</p>
                        <p style="text-align:justify">-&nbsp;Vũ khí, đạn dược, các vận dụng gây sát thương khác</p>
                        <p style="text-align:justify">-&nbsp;Thực phẩm, đồ gia dụng, đồ chơi trẻ em… không xác nhận nguồn gốc, có chất gây độc hại ảnh hưởng đến người sử dụng</p>
                        <p style="text-align:justify">-&nbsp;Các loại vật phẩm, ấn phẩm, tài liệu đồi trụy, phản động</p>
                        <p style="text-align:justify">-&nbsp;Động vật, thực vật&nbsp;sống</p>
                        <p style="text-align:justify">-&nbsp;Các loại hàng hóa khác trong danh mục cấm vận chuyển, kinh doanh của theo quy định của Pháp luật</p>
                        <p style="text-align:justify"><em><strong>1.2. Các mặt hàng đặc biệt</strong></em></p>
                        <p style="text-align:justify">Các loại hàng đặc biệt phải thông báo với chúng tôi khi đặt hàng (nếu không thông báo chúng tôi sẽ không chịu trách nhiệm về vấn đề hỏng hóc, không đúng thời hạn giao hàng…)</p>
                        <p style="text-align:justify">-&nbsp;Hạt giống, mầm cây</p>
                        <p style="text-align:justify">-&nbsp;Chất dễ cháy nổ: Pin, ắc quy, diêm, bật lửa đã có ga</p>
                        <p style="text-align:justify">-&nbsp;Chất lỏng, hóa chất, các loại hàng hóa chứa cồn</p>
                        <p style="text-align:justify">-&nbsp;Loa đài, các hàng hóa có nam châm</p>
                        <p style="text-align:justify">-&nbsp;Các loại mặt hàng dễ vỡ: chai lọ, bát đĩa, đồ gốm, đồ nhựa mỏng, hàng hoá chất liệu mica, gương kính,...</p>
                        <p style="text-align:justify">- Hàng hoá máy móc, thiết bị điện tử,... đã qua sử dụng</p>
                        <p style="text-align:justify">-&nbsp;Đặc biệt: Các loại hàng nhái (hàng fake)&nbsp;các thương hiệu lớn, chúng tôi không khuyến khích đặt các loại mặt hàng này và sẽ không đảm bảo chất lượng cũng như hình dáng bề ngoài giống ảnh và mô tả trên website</p>
                        <p style="text-align:justify">&nbsp;</p>
                        <p style="text-align:justify"><strong>2. Bảo mật thông tin</strong></p>
                        <p style="text-align:justify">-&nbsp;Chúng tôi cam kết bảo mật toàn bộ các thông tin cá nhân, mặt hàng, nguồn hàng đặt… với tất cả các khách hàng đăng ký và sử dụng dịch vụ.</p>
                        <p style="text-align:justify">-&nbsp;Khách hàng có trách nhiệm tự bảo mật các thông tin về tài khoản, mật khẩu. Tuyệt đối không sử dụng tài khoản của người khác hoặc cho người khác mượn tài khoản.</p>
                        <p style="text-align:justify">&nbsp;</p>
                        <p style="text-align:justify"><strong>3. Quy định về đặt hàng, thanh toán</strong></p>
                        <p style="text-align:justify"><em><strong>3.1. Cách thức đặt hàng</strong></em></p>
                        <p style="text-align:justify">Xem hướng dẫn tại <a href="http://www.dathangchina.com/huong-dan-dat-hang" target="_blank">đây</a></p>
                        <p style="text-align:justify"><em><strong>3.2. Quy định thanh toán</strong></em></p>
                        <p style="text-align:justify">- Chúng tôi chỉ sử dụng 01 thông tin liên hệ và thanh toán duy nhất tại <a href="http://www.dathangchina.com/lien-he" target="_blank">đây</a>. Khi thanh toán chuyển khoản, quý khách nên ghi chú rõ ràng, đầy đủ như hướng dẫn. Nếu không chúng tôi không chịu trách nhiệm nếu đặt hàng chậm và hàng về không đúng quy định.</p>
                        <p style="text-align:justify">- Đối với đơn hàng dưới 2.000.000 VND quý khách phải thanh toán trước 100% giá trị đơn hàng.</p>
                        <p style="text-align:justify">- Đối với đơn hàng trên 2.000.000 VND quý khách đặt cọc 80% đơn hàng nhưng tổng dư nợ không quá 40.000.000 VND/khách.</p>
                        <p style="text-align:justify">- Đối vời trường hợp hoàn tiền do hủy đơn, hết hàng, thiếu hàng…sẽ giải quyết chậm nhất trong vòng 2 ngày và quý khách sẽ phải chịu phí chuyển khoản do ngân hàng thu.</p>
                        <p style="text-align:justify">- Hủy đơn: thời gian hủy đơn đã thanh toán chậm nhất là 3 tiếng sau khi thanh toán.</p>
                        <p style="text-align:justify">- Trường hợp khách hàng chọn hình thức vận chuyển chậm, vui lòng thanh toán 100% giá trị đơn hàng.</p>
                        <p style="text-align:justify">- Sau khi khách hàng thanh toán, đơn hàng sẽ được đặt trong vòng 24 giờ.</p>
                        <p style="text-align:justify">&nbsp;</p>
                        <p style="text-align:justify"><strong>4.&nbsp;Quy định về vận chuyển</strong></p>
                        <p style="text-align:justify"><em><strong>4.1. Mức tính phí VC tối thiểu</strong></em></p>
                        <p>- Đối với hàng hóa vận chuyển Trung Quốc – VN: Mức thấp nhất được tính là 2 kg (các kiện hàng nhỏ hơn 2 kg sẽ được làm tròn tới 2 kg để tính phí cho mỗi đơn hàng).&nbsp;</p>
                        <p>- Đối với hàng hóa vận chuyển Hàn Quốc – VN: Với kiện hàng có khối lượng dưới 1 kg sẽ được tính theo các mốc 0.3 kg, 0.6 kg hoặc 1 kg, làm tròn lên tới mốc gần nhất.</p>
                        <p style="text-align:justify">- Khi nhận hàng quý khách cần kiểm tra đủ số kiện, cân nặng và ký nhận đối với nhân viên giao hàng. Sau khi ký nhận chúng tôi sẽ không nhận thắc mắc về số kiện và cân nặng của lần giao hàng đó.</p>
                        <p style="text-align:justify">-&nbsp;Giá cước vận chuyển: &nbsp;Giá cước vận chuyển được tính tại thời điểm hàng xuất kho tại VN nên có thể sẽ thay đổi theo giá thị trường tại thời điểm đó.</p>
                        <p><em><strong>4.2. Quy định về vận chuyển đối với hàng hàng cồng kềnh</strong></em></p>
                        <p>Áp dụng đối với các mặt hàng có khối lượng nhẹ thể tích lớn</p>
                        <p><em>Trọng lượng quy đổi = Chiều dài (cm) * Chiều rộng&nbsp;(cm)* Chiều cao (cm)&nbsp;/ 6000</em></p>
                        <p>Nếu khối lượng &gt; hoặc = trọng lượng quy đổi: Tính giá vận chuyển theo khối lượng</p>
                        <p>Nếu khối lượng &lt; trọng lượng quy đổi: Tính giá vận chuyển theo trọng lượng quy đổi</p>
                        <p><em><strong>4.3. Quy định đối với giao hàng trong nội thành Hà Nội và TP. Hồ Chí Minh</strong></em></p>
                        <p>Chúng tôi thực hiện giao hàng miễn phí cho quý khách ở khu vực nội thành Hà Nội và Hồ Chí Minh cụ thể như sau:</p>
                        <p>- Hà Nội: Hai Bà Trưng, Thanh Xuân, Hoàn Kiếm, Ba Đình, Cầu Giấy, Đống Đa, Hoàng Mai</p>
                        <p>- Hồ Chí Minh: Quận 1-8, Quận&nbsp;10, 11, Tân Bình, Tân Phú, Bình Thạnh, Gò Vấp, Phú Nhuận</p>
                        <p>Khách hàng nằm ngoài các khu vực này, vui lòng tới chi nhánh nhận hàng hoặc chuyển hàng chịu phí.</p>
                        <p><u><em>Lưu ý:&nbsp;</em></u></p>
                        <p>- Chúng tôi chỉ áp dụng giao hàng đến chân các tòa nhà cao tầng, chung cư,...&nbsp;</p>
                        <p>- Khi đến giao hàng: thời gian đợi nhận hàng là 10 phút từ khi thông báo hàng đã đến.&nbsp;Quá thời gian trên, quý khách vui lòng đến các chi nhánh để nhận hàng hoặc giao hàng có thu phí (phí cụ thể sẽ được thông báo trong mỗi trường hợp).</p>
                        <p><em><strong>4.4. Quy định đối với giao hàng ngoại thành Hà Nội, TP. Hồ Chí Minh và đi tỉnh</strong></em></p>
                        <p>Hiện tại để đảm bảo vấn đề hàng hóa chúng tôi thực hiện hình thức chuyển phát nhanh qua Viettel Post.</p>
                        <p>Có 2 hình thức chuyển phát nhanh và chuyển phát chậm: Tùy từng mặt hàng nhân viên chúng tôi sẽ tư vấn để quý khách lựa chọn hình thức phù hợp hơn. Phí VC được thanh toán trước và tính theo biểu phí hàng hoá của Viettel Post.</p>
                        <p>Đối với hình thức chuyển xe: Chúng tôi chỉ áp dụng chuyển xe đối với các nhà xe do khách hàng cung cấp và không đảm bảo hàng hóa toàn vẹn và không mất mát&nbsp;trong quá trình chuyển.&nbsp;Phí vào bến 20,000/lần chuyển.&nbsp;</p>
                        <p><em><strong>4.5. Thời gian chuyển hàng</strong></em></p>
                        <p>- Các đơn hàng thông thường sẽ tới HN sau 7 – 10 ngày, tới TP. Hồ Chí Minh sau 9 – 12 ngày. Tuy nhiên với các mặt hàng chứa pin, hoá chất, nước,… do không chuyển theo đường nhanh nên sẽ tới HCM chậm trễ hơn từ 2 – 5 ngày. Thời gian chuyển chậm áp dụng với hàng Hàn Quốc là 30 - 35 ngày (mỗi tháng chỉ có 2 đợt chuyển hàng chậm).</p>
                        <p>- Trường hợp hàng về chậm do thiên tai, thất lạc, thủ tục hải quan....: Đây là lý do khách quan công ty chúng tôi không hề mong muốn. Nhưng với tinh thần hỗ trợ khách hàng tối đa có thể, nếu quá 30 ngày quy định quý khách chưa nhận được hàng hóa chúng tôi sẽ bồi hoàn 100% giá trị hàng hóa (nếu khách không nhận hàng) hoặc giảm giá từ 20-50% giá trị hàng hóa (nếu khách nhận hàng).</p>
                        <p>&nbsp;</p>
                        <p style="text-align:justify"><strong>5. Chính sách giải quyết khiếu nại</strong></p>
                        <p style="text-align:justify">-&nbsp;Thời gian khiếu nại: Trong vòng&nbsp;2 ngày tính từ ngày quý khách nhận được kiện hàng.</p>
                        <p style="text-align:justify">-&nbsp;Trường hợp hàng sai: mẫu mã, mầu sắc, chủng loại, quy cách…do <strong>đặt hàng</strong>. Chúng tôi sẽ bồi thường 100% giá trị hàng hóa cho quý khách. Trường hợp hàng sai do phía nhà cung cấp phát sai sản phẩm, chúng tôi sẽ hỗ trợ tối đa trong việc giao dịch và đàm phán lại với đối tác, đảm bảo quý khách hàng không phải chịu thiệt thòi.</p>
                        <p style="text-align:justify">-&nbsp;Chất lượng sản phẩm: Vì chỉ là đơn vị trung gian giữa nhà cung cấp và khách hàng nên chúng tôi không chịu trách nhiệm về chất lượng sản phẩm. Nhưng chúng tôi sẽ hỗ trợ tối đa trong việc khiếu nại với nhà cung cấp trong trường hợp hàng hóa có vấn đề về chất lượng. Ngoài ra, nếu gặp rủi ro chúng tôi sẽ hỗ trợ một phần giá trị hàng hóa.</p>
                        <p style="text-align:justify">-&nbsp;Đối với hàng hóa vỡ, hỏng, trầy xước do quá trình vận chuyển. Chúng tôi sẽ tùy thuộc vào mức độ hỏng hóc mà đền bù quý khách ở một mức thỏa đáng nhất.</p>
                        <p style="text-align:justify">-&nbsp;Chúng tôi CHỈ tiếp nhận xử lý khiếu nại khi có đầy đủ hình ảnh (sản phẩm, giao dịch, vỏ kiện hàng - là mã vận đơn dán trên từng kiện hàng) và các thông tin liên quan khác.</p>
                        <p style="text-align:justify">-&nbsp;Quý khách nên thường xuyên vào kiểm tra trạng thái của từng đơn hàng vì chúng tôi chỉ thông báo tình trạng trên 1 kênh duy nhất là hệ thống chung.</p>
                        <p style="text-align:justify">&nbsp;</p>
                        <p style="text-align:justify"><strong>6. &nbsp;Ngừng cung cấp dịch vụ</strong></p>
                        <p style="text-align:justify">Trong các trường hợp sau, Đặt hàng China có quyền đơn phương từ chối cung cấp dịch vụ, bằng cách khóa tài khoản của quý khách trên hệ thống mà không cần có sự đồng ý trước:&nbsp;</p>
                        <p style="text-align:justify">-&nbsp;Sử dụng thông tin và dịch vụ của Đặt hàng China vào các mục đích khác, sai bản chất dịch vụ hoặc không được sự đồng ý trước của Chúng tôi.&nbsp;</p>
                        <p style="text-align:justify">-&nbsp;Bất cứ hành động gian lận nào trong giao dịch: Báo thiếu khi nhận đủ, giả mạo thanh toán, khiếu nại không đúng với các quy định về khiếu nại.</p>
                        <p style="text-align:justify">-&nbsp;Đăng tải hoặc cung cấp thông tin sai sự thật, với mục đích làm giảm uy tín của Đặt hàng China đối với khách hàng.</p>
                        <p style="text-align:justify">-&nbsp;Đăng ký giả mạo cá nhân hoặc tổ chức spam đơn hàng liên tục gây ảnh hưởng đến tốc độ xử lý đơn hàng chung.</p>
                        <p style="text-align:justify">- Sử dụng lời lẽ khiếm nhã, có thái độ bất lịch sự, gây gổ với nhân viên công ty Đặt hàng China.</p>
                        <p style="text-align:justify">-&nbsp;Có những yêu cầu không chính đáng, vượt ra ngoài phạm vi quản lý của Đặt hàng China và sai lệch về bản chất của dịch vụ Nhập hàng hộ.</p>
                    </div>
                </div>
</div>
@endsection
