@extends('layout')
@section('page','Danh Sách Đơn Hàng')
@section('title','Danh Sách Đơn Hàng - Nhập hàng china')
@section('content-page')
    <div class="container">
        <h2>Đơn hàng hiện tại</h2>
        <table class="table table-hover" style="max-width: 80%">
            <thead>
            <tr>
                <th>Người mua</th>
                <th>Tổng gía</th>
                <th>Ghi chú</th>
                <th>Quá trình</th>
                <th>Ngày tạo</th>
                <th>Cập nhật</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donhang as $dh)
                @if ($dh->status == 0)
                    <tr class="danger">
                @elseif ( $dh->status == 1)
                    <tr class="info">
                @elseif ( $dh->status >= 2)
                    <tr class="success">
                @endif
                    <td> {{$dh->id}}</td>
                    <td> {{$dh->total_cost}}</td>
                    <td> {{$dh->note}}</td>
                    <td> @if ($dh->status == 0)
                                Đã Hủy
                            @elseif ($dh->status == 1)
                                Đang chờ 
                            @elseif ($dh->status == 2)
                                Người dùng đã chốt
                            @elseif ($dh->status == 3)
                                Đơn hàng đã chốt
                            @elseif ($dh->status == 4)
                                Đang chuyển hàng
                            @elseif ($dh->status == 5)
                                Thành công
                        @endif
                    </td>
                    <td> {{$dh->created_at}}</td>
                    <td> {{$dh->updated_at}}</td>
                    <td>
                        <a type="button" href='danhsachsanpham/{{$dh->id}}' class="btn btn-danger">Xem chi tiết</a>

                        @if ($dh->state == 1)
                            <a type="button" href='#' class="btn btn-info">Đặt hàng</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h2>Danh sách các đơn hàng</h2>
        <table class="table table-hover" style="max-width: 80%">
            <thead>
            <tr>
                <th>Người mua</th>
                <th>Tổng gía</th>
                <th>Ghi chú</th>
                <th>Quá trình</th>
                <th>Ngày tạo</th>
                <th>Cập nhật</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donhang as $dh)
                @if ($dh->status == 0)
                    <tr class="danger">
                @elseif ( $dh->status == 1)
                    <tr class="info">
                @elseif ( $dh->status >= 2)
                    <tr class="success">
                @endif
                    <td> {{$dh->id}}</td>
                    <td> {{$dh->total_cost}}</td>
                    <td> {{$dh->note}}</td>
                    <td> @if ($dh->status == 0)
                                Đã Hủy
                            @elseif ($dh->status == 1)
                                Đang chờ 
                            @elseif ($dh->status == 2)
                                Người dùng đã chốt
                            @elseif ($dh->status == 3)
                                Đơn hàng đã chốt
                            @elseif ($dh->status == 4)
                                Đang chuyển hàng
                            @elseif ($dh->status == 5)
                                Thành công
                        @endif
                    </td>
                    <td> {{$dh->created_at}}</td>
                    <td> {{$dh->updated_at}}</td>
                    <td>
                        <a type="button" href='danhsachsanpham/{{$dh->id}}' class="btn btn-danger">Xem chi tiết</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection