@extends('layout')
@section('page','Thông tin cá nhân')
@section('title','Thông tin tài khoản- Nhập hàng china')
@section('content-page')
<div class="blog-list">
<div class="container" style="color:white;">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <h2 class="panel-heading"><span class="glyphicon glyphicon-user" style="margin-right: 30px; font-size: 40px;"></span>Thông tin tài khoản</h2>
                    <div class="panel-body">
                       @if($errors)
                        @if(count($errors)>0)
                          <div class="alert alert-danger">
                            <ul>
                              @foreach($errors->all() as $error )
                                <li>{{$error}}</li>
                              @endforeach
                            </ul>
                          </div>
                        @endif
                        @endif


                        @if(session('thongbao'))
                             <div class="alert alert-success">
                                {{session('thongbao')}}
                             </div>

                        @endif
                        <form action="AccountSettings" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                            <div>
                                <label>Tên :</label>
                                <input type="text" class="form-control" placeholder="username" name="username" aria-describedby="basic-addon1" value="{!! Auth::user()->name!!}" >
                            </div>
                            <br>
                             <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="email" name="email" aria-describedby="basic-addon1" value="{!! Auth::user()->email!!}">
                            </div>
                            <br>
                              <div>
                                <label>Phone Number</label>
                                <input type="text" disabled class="form-control" placeholder="phone_number" name="phonenumber" aria-describedby="basic-addon1" value="{!! Auth::user()->phonenumber!!}">
                            </div>
                            <br>
                            <div>
                                <label>Địa chỉ nhà / giao hàng :</label>
                                <input type="text" class="form-control" placeholder="địa chỉ" name="address" aria-describedby="basic-addon1" value="{!! Auth::user()->address!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Số tài khoản ngân hàng :</label>
                                <input type="text" class="form-control" placeholder="Số tài khoản ngân hàng" name="bank_number" aria-describedby="basic-addon1" value="{!! Auth::user()->bank_number!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Tên ngân hàng, chi nhánh :</label>
                                <input type="text" class="form-control" placeholder="Tên ngân hàng, chi nhánh" name="bank_name" aria-describedby="basic-addon1" value="{!! Auth::user()->bank_name!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Chủ tài khoản :</label>
                                <input type="text" class="form-control" placeholder="Chủ tài khoản" name="bank_user_name" aria-describedby="basic-addon1" value="{!! Auth::user()->bank_user_name!!}" >
                            </div>
                            <br>

                            <button type="submit" class="btn btn-success">Cập nhật
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
</div>
</div>
@endsection