@extends('layout')
@section('page','Đổi mật khẩu')
@section('title','Đổi mật khẩu - Nhập hàng china')
@section('content-page')
<div class="blog-list">
<div class="container" style="color:white;">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <h2 class="panel-heading"><span class="glyphicon glyphicon-user" style="margin-right: 30px; font-size: 40px;"></span>Thay đổi mật khẩu</h2>
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
                                <label>Mật khẩu cũ :</label>
                                <input type="password" class="form-control" placeholder="old password" name="old_password" aria-describedby="basic-addon1" >
                            </div>
                            <br>
                             <div>
                                <label>Mật khẩu mới : </label>
                                <input type="password" class="form-control" placeholder="new password" name="new_password" aria-describedby="basic-addon1" >
                            </div>
                            <br>
                              <div>
                                <label>Nhập lại mật khẩu mới :</label>
                                <input type="password"  class="form-control" placeholder="new password" name="re_new_password" aria-describedby="basic-addon1" >
                            </div>
                            <br>

                            <button type="submit" class="btn btn-success">Đổi mật khẩu
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