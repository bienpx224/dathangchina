@extends('layout')
@section('page','Danh Sách Sản Phẩm')
@section('title','Danh Sách Sản Phẩm - Nhập hàng china')
@section('content-page')
    <div class="container">
        <h2>Danh sách Sản Phẩm</h2>
        <table class="table table-hover" style="max-width: 80%">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Link</th>
                <th>Ảnh</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
                <th>Màu</th>
                <th>Cỡ</th>
                <th>Ghi chú</th>
                <th>State</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sanpham as $sp)
                <tr>
                    <td> {{$sp->title}}</td>
                    <td> {{$sp->link}}</td>
                    <td> {{$sp->image}}</td>
                    <td> {{$sp->price}}</td>
                    <td> {{$sp->quantity}}</td>
                    <td> {{$sp->cost}}</td>
                    <td> {{$sp->color}}</td>
                    <td> {{$sp->size}}</td>
                    <td> {{$sp->note}}</td>
                    <td> {{$sp->state}}</td>
                    <td> {{$sp->status}}</td>
                    {{--
                    <td> @if ($sp->state == 0)
                            Đã Hủy
                        @elseif ($sp->state == 1)
                            Chưa đặt hàng
                        @else
                            Đã đặt hàng
                        @endif
                    </td>
                    <td> {{$sp->status}}</td>
                    <td>
                        <a type="button" href='danhsachsanpham.{{$sp->user_id}}' class="btn btn-danger">Xem chi tiết</a>
                    </td>
                    <td>
                        @if ($sp->state == 1)
                            <a type="button" href='#' class="btn btn-info">Đặt hàng</a>
                        @endif
                    </td>
                    --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection