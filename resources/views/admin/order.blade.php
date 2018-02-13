@extends('admin.layout.index')
@section('title','Quản lý - Đặt hàng China')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="container">
                <h2>Quản lý đơn hàng</h2>
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
                    </tr>
                    </thead>
                    <tbody>
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
                                <a type="button" href='danhsachsanpham/{{$dh->id}}' class="btn btn-info">Xem chi tiết</a>
                            </td>
                            <td>
                                <a type="button" href='/admin/order/delete/{{$dh->id}}' class="btn btn-danger">Xóa</a>
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