@extends('index')
@section('title','Tuyển dụng - Nhập hàng china')
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
                <span>Tuyển dụng</span>
            </li>
        </ul>
    </div>
    <!-- End Breadcrumb -->
    <span class="nh-divide"></span>
    <div style="clear: both"></div>
    <div class="blog-pages">
        <div class="blog-pages-right blog-page">
            <div class="blog-list">
                <h1 style="text-align: center;margin:0 10px 15px 10px;">Tuyển dụng</h1>
                <div class="contentx">
                    <p><span style="color:#FF0000"><span style="font-size:22px"><strong>Tuyển gấp Lập trình viên PHP</strong></span></span></p>
                    <p>&nbsp;</p>
                    <p><strong>Mô tả công việc:&nbsp;</strong></p>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Xây dựng và vận hành hệ thống website thương mại điện tử.</div>
                    </div>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Xây dựng hệ thống quản lý nội bộ trên nền web, phát triển trang DatHangChina .</div>
                    </div>
                    <p><strong>Quyền lợi:</strong></p>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Làm việc trong môi trường năng động, chuyên nghiệp, học hỏi nhiều kinh nghiệm.</div>
                    </div>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Mức lương từ 7 - 10tr + phụ cấp ăn trưa.</div>
                    </div>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Nghỉ chiều t7 và chủ nhật, nghỉ lễ theo lịch nhà nước.</div>
                    </div>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Được đóng BHXH và BHYT khi trở thành nhân viên chính thức.</div>
                    </div>
                    <p><strong>Yêu cầu:</strong></p>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Ít nhất 1 đến 2 năm kinh nghiệm làm việc với PHP. Biết sử dụng PHP Framework (ưu tiên Laravel)</div>
                    </div>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Thành thạo Javascript và CSS</div>
                    </div>
                    <div style="color: rgb(29, 33, 41); font-family: helvetica, arial, sans-serif; font-size: 14px; line-height: 18px; white-space: pre-wrap;">
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Biết sử dụng javascript framework là lợi thế</div>
                        <div class="_1mf _1mj" style="position: relative; direction: ltr;">- Có máy tính cá nhân</div>
                    </div>
                    <p><strong>Địa điểm làm việc</strong>: Ngõ 6 Phố Đặng Văn Ngữ, Phương Liên, Đống Đa, Hà Nội</p>
                    <p>Ứng viên quan tâm gửi CV về mail: <span style="color:#FF0000">dathangchina88@gmail.com</span> - Tiêu đề ghi rõ họ tên và vị trí ứng tuyển.</p>
                    <p>Thắc mắc xin liên hệ bộ phận tuyển dụng theo sđt: <span style="color:#FF0000">0948.449.444</span></p>
                    <p>Hạn nộp hồ sơ: 31/12/2017.</p>
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