@extends('admin.layout.index')
@section('title','Quản lý - Đặt hàng China')
@section('content')
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
                                    <option value="">Tất cả</option>
                                    <option value="chưa gửi">Chưa gửi</option>
                                    <option value="đang xử lý">Đang xử lý</option>
                                    <option value="đã báo giá">Đã báo giá</option>
                                    <option value="đang đặt hàng">Đang đặt hàng</option>
                                    <option value="thành công">Thành công</option>
                                    <option value="đã hủy">Đã hủy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <br>
                                <input type="submit" class="btn btn-info" name="search" value="Search">
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-hover" style="max-width: 80%">
                    <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Tổng gía</th>
                        <th>Ghi chú</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($donhang)
                    @foreach ($donhang as $dh)
                        <tr>
                            <td> {{$dh->id}}</td>
                            <td> {{$dh->name}}</td>
                            <td> {{$dh->phonenumber}}</td>
                            <td> {{$dh->total_cost}}</td>
                            <td> {{$dh->note}}</td>
                            <td> @if ($dh->state == 0)
                                    Đã Hủy
                                @elseif ($dh->state == 1)
                                    Chưa đặt hàng
                                @else
                                    Đã đặt hàng
                                @endif
                            </td>
                            <td> {{$dh->status}}</td>
                            <td>
                                <a type="button" href="{{ route('admin.order.detail', $dh->id) }}" class="btn btn-info">Xem chi tiết</a>
                            </td>
                            <td>
                                <a type="button" href="{{ route('admin.order.delete', $dh->id) }}" class="btn btn-danger">Xóa</a>
                            </td>
                            <td>
                                @if ($dh->status == 'đang xử lý')
                                    <a type="button" href="{{ route('admin.order.edit', $dh->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @else
                        Khong co
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection