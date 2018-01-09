@extends('admin.layout.index')
@section('title','Quản lý - Đặt hàng China')
@section('content')
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Thông tin cá nhân : {!! Auth::user()->name !!}
                          @include('admin.role')
                            <small></small>
                        </h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-10" style="padding-bottom:120px">
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
                                <label>Địa chỉ :</label>
                                <input type="text" class="form-control" placeholder="địa chỉ" name="address" aria-describedby="basic-addon1" value="{!! Auth::user()->address!!}" >
                            </div>
                            <br>
                            <div>
                                <label>Ngày bat đầu :</label>
                                <input type="text" disabled class="form-control" placeholder="địa chỉ" name="address" aria-describedby="basic-addon1" value="{!! Auth::user()->created_at!!}" >
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Cập nhật
                            </button>

                        </form>
                    </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection