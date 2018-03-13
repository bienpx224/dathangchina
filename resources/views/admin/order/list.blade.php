@extends('admin.layout.index')
@section('title','Quản lý - Đặt hàng China')
@section('content')
<style type="text/css">
    .btn{padding: 0px;}
</style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="container">
                <h2>Quản lý đơn hàng</h2>
                <form action="{{route('admin.order.search')}}" method="get">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="phonenumber">Phone Number:</label>
                                <input type="tel" class="form-control" name="phonenumber">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <select class="form-control" name="status">
                                    <option value="6">Tất cả</option>
                                    <option value="1">Đang chờ</option>
                                    <option value="2">Khách đã chốt</option>
                                    <option value="3">Nhân viên chốt</option>
                                    <option value="4">Đang chuyển hàng</option>
                                    <option value="5">Thành công</option>
                                    <option value="0">Đã hủy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <br>
                                <input type="submit" style="padding: 4px 6px;" class="btn btn-info" name="search" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-hover" style="max-width: 80%">
            <thead>
            <tr>
                <th>Mã</th>
                <th>Người mua</th>
                <th>Phone</th>
                <th>Tổng gía</th>
                <th>Ghi chú</th>
                <th>Quá trình</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donhang as $dh)
                @if ($dh->status == 0)
                    <tr class="danger">
                @elseif ( $dh->status == 1)
                    <tr class="default">
                @elseif ( $dh->status == 2)
                    <tr class="info">
                @elseif ( $dh->status >= 3)
                    <tr class="success">        
                @endif
                    <td> {{$dh->id}}</td>
                    <td> {{$dh->name}}</td>
                    <td> {{$dh->phonenumber}}</td>
                    <td> {{$dh->total_cost}}</td>
                    <td> {{$dh->note}}</td>
                    <td> @if ($dh->status == 0)
                                Đã Hủy X
                            @elseif ($dh->status == 1)
                                Đang chờ... 
                            @elseif ($dh->status == 2)
                                Người dùng đã chốt
                            @elseif ($dh->status == 3)
                                Đơn hàng đã chốt
                            @elseif ($dh->status == 4)
                                Đang chuyển hàng...
                            @elseif ($dh->status == 5)
                                Thành công !!!
                        @endif
                    </td>
                    <td> {{$dh->created_at}}</td>
                    <td>
                        <a type="button" href="{{ route('admin.order.detail', $dh->id) }}" class="btn btn-info" style="width: 100px;">
                            <span class="glyphicon glyphicon-pencil" style="padding: 0px 5px;"></span>Chi tiết
                        </a>

                        @if ($dh->status ==2)
                            @if($count > 0)
                        <form action="{!! route('buyOrderAdmin') !!}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="dh_sp" value="{{$dh->id}}">
                            <button type="submit" class="btn btn-success" style="width: 100px;">
                                <span class="glyphicon glyphicon-shopping-cart" style="padding: 0px 5px;"></span>Chốt đơn
                            </button>
                        </form>

                        <a type="button" href="{{ route('admin.order.delete', $dh->id) }}" class="btn btn-danger" style="width: 100px;">
                            <span class="glyphicon glyphicon-pencil" style="padding: 0px 5px;"></span>Hủy đơn
                        </a>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection