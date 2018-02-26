@extends('admin.layout.index')
@section('title','Quản lý - Đặt hàng China')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <style type="text/css">
                .list-sp>tbody>tr>td{ max-height: 30px; max-width: 100px; overflow: hidden;}
                .list-sp>tbody>tr>td>div{ max-height: 120px; max-width: 100px; overflow: hidden;}
                .btn{margin: 2px 0px;}
            </style>

            <div class="container">
                <h2>Danh sách Sản Phẩm</h2>
                <table class="table table-hover list-sp" style="max-width: 80%; border: 1px;">
                    <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Link</th>
                        <th>Ảnh</th>
                        <th>Đơn giá (Yên)</th>
                        <th>Đơn giá (VNĐ)</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Màu</th>
                        <th>Cỡ</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sanpham as $sp)
                        @if ($sp->status == 0 || $sp->status == 3)
                            <tr class="danger">
                        @elseif ( $sp->status == 2)
                            <tr class="success">
                        @elseif ( $sp->status == 1)
                            <tr class="info">
                                @endif
                                <form action="{!! route('updateProductUser') !!}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="id_sp" value="{{$sp->id}}">
                                    <td><div title="{{$sp->title}}"> {{$sp->title}}</div></td>
                                    <td> <a title="{{$sp->link}}" target="_blank" href="{{$sp->link}}">{{$sp->link}}</a></td>
                                    <td> <img class="responsive" src="{{$sp->image}}"/></td>
                                    <td>
                                        @if($sp->status == 2  || $sp->status == 3)
                                            {{$sp->price}}
                                        @else
                                            <input type="number" value="{{$sp->price}}">
                                        @endif
                                    </td>
                                    <td> {{$sp->vnd}}</td>
                                    <td> {{$sp->quantity}} </td>
                                    <td> {{$sp->cost}}</td>
                                    <td> {{$sp->color}}</td>
                                    <td> {{$sp->size}}</td>
                                    <td> {{$sp->note}}</td>
                                    <td>@if ($sp->status == 1)
                                            Đang chờ
                                        @elseif ($sp->status == 2)
                                            Đã chốt
                                        @elseif ($sp->status == 0)
                                            Đã hủy
                                        @else
                                            Hết hàng
                                        @endif
                                    </td>
                                    <td>
                                        @if($sp->status == 1)
                                            <button class="btn btn-primary" type="submit" style="width: 90px; margin-right: 10px;">
                                                <span class="fa fa-edit" style="padding-right: 2px;"></span>Cập nhật
                                            </button>
                                    @endif
                                </form>

                                @if($sp->status == 1 && $sp->state == 1)

                                    <form  action="{!! route('cancelProductUser') !!}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="id_sp" value="{{$sp->id}}">
                                        <button class="btn btn-success" type="submit"  style="width: 90px;" >
                                            <span class="fa fa-success" style="padding-right: 2px;"></span>Chốt hạ
                                        </button>
                                    </form>
                                @endif
                                @if($sp->status == 1 && $sp->state == 1)

                                    <form  action="{!! route('cancelProductUser') !!}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="id_sp" value="{{$sp->id}}">
                                        <button class="btn btn-danger" type="submit"  style="width: 90px;" >
                                            <span class="fa fa-danger" style="padding-right: 2px;"></span>Hết hàng
                                        </button>
                                    </form>
                                @endif


                                    </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>

            <script type="text/javascript">
                $('document').ready(function(){

                })


            </script>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection