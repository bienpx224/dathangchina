@extends('layout')
@section('page','Danh Sách Đơn Hàng')
@section('title','Danh Sách Đơn Hàng - Nhập hàng china')
@section('content-page')
    <div class="container">
        <h2>Danh sách đơn hàng</h2>
        <table class="table table-hover" style="max-width: 80%">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Link</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donhang as $dh)
                <tr>
                    <td> {{$dh->name}}</td>
                    <td> {{$dh->description}}</td>
                    <td> {{$dh->cost}}</td>
                    <td> {{$dh->link}}</td>
                    <td> {{$dh->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection