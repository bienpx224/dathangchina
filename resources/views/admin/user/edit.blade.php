@extends('admin.layout.index')
@section('title','Thông tin tài khoản')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-lg-12">
                        <h3 class="page-header">Thông tin tài khoản : {!! $user->name !!}
                            <small></small>
                        </h3>
                    </div> -->
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-10" style="padding-bottom:120px">
                        <div class="panel panel-default">
                    <h2 class="panel-heading"><span class="glyphicon glyphicon-user" style="margin-right: 30px; font-size: 40px;"></span>Thông tin tài khoản : {!! $user->name !!}</h2>
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
                        <form action="{{ route('admin.user.postEdit', $user->id) }}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                            <input type="hidden" name="id" value="{!! $user->id !!}"/>
                            <div>
                                <label>Tên :</label>
                                <input type="text" disabled class="form-control" placeholder="username" name="username" aria-describedby="basic-addon1" value="{!! $user->name!!}" >
                            </div>
                            <br>
                             <div>
                                <label>Email</label>
                                <input type="email" disabled class="form-control" placeholder="email" name="email" aria-describedby="basic-addon1" value="{!! $user->email!!}">
                            </div>
                            <br>
                              <div>
                                <label>Phone Number</label>
                                <input type="text" disabled class="form-control" placeholder="phone_number" name="phonenumber" aria-describedby="basic-addon1" value="{!! $user->phonenumber!!}">
                            </div>
                            <br>
                            <div>
                                <label>Quyền tài khoản </label>
                                <select class="form-control" name="authority">
                                    <option <?php if($user->authority==1) echo 'selected'  ?> value="1"> Khách hàng</option>
                                    <option <?php if($user->authority==2) echo 'selected'  ?> value="2"> Nhân viên</option>
                                    <option <?php if($user->authority==3) echo 'selected'  ?> value="3"> Quản lý</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <label>Địa chỉ nhà / giao hàng :</label>
                                <input type="text" disabled class="form-control" placeholder="địa chỉ" name="address" aria-describedby="basic-addon1" value="{!! $user->address!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Số tài khoản ngân hàng :</label>
                                <input type="text" disabled class="form-control" placeholder="Số tài khoản ngân hàng" name="bank_number" aria-describedby="basic-addon1" value="{!! $user->bank_number!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Tên ngân hàng, chi nhánh :</label>
                                <input type="text" disabled class="form-control" placeholder="Tên ngân hàng, chi nhánh" name="bank_name" aria-describedby="basic-addon1" value="{!! $user->bank_name!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Chủ tài khoản :</label>
                                <input type="text" disabled class="form-control" placeholder="Chủ tài khoản" name="bank_user_name" aria-describedby="basic-addon1" value="{!! $user->bank_user_name!!}" >
                            </div>
                            <br>

                            <button type="submit" class="btn btn-success">Cập nhật
                            </button>

                            <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này')" href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger">Xóa tài khoản
                            </a>

                        </form>
                    </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection