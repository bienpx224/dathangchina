@extends('layout')
@section('page','Danh Sách Đơn Hàng')
@section('title','Danh Sách Đơn Hàng - Nhập hàng china')
@section('content-page')
    <div class="container">
        <h2>Danh sách đơn hàng</h2>
        <table class="table table-hover" style="max-width: 80%">
            <thead>
            <tr>
                <th>Mã đơn hàng</th>
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
                        <a type="button" href='danhsachsanpham/{{$dh->id}}' class="btn btn-danger">Xem chi tiết</a>
                    </td>
                    <td>
                        @if ($dh->state == 1)
                            <a type="button" href='#' class="btn btn-info">Đặt hàng</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection