@extends('index')
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
                <span>@yield('page')</span>
            </li>
        </ul>
    </div>
    <!-- End Breadcrumb -->
    <span class="nh-divide"></span>
    <div style="clear: both"></div>
    <div class="blog-pages">
        <div class="blog-pages-right blog-page">
            @yield('content-page')
            @include('bloc-quick')
        </div>
    </div>
</div>
<div style="clear: both"></div>
</div>
</div>
@endsection