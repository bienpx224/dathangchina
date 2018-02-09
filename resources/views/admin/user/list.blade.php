@extends('admin.layout.index')
@section('title','Danh sách User - DatHangChina')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     <form action="{!! route('admin.user.active') !!}" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Check</th>
                                <th>Tên</th>
								<th>Email</th>
								<th>SĐT</th>
                                <th>Trạng thái</th>
                                <th>Quyền</th>
                                <th>Chi tiết-Xóa</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($user as $us)

                            <tr class="odd gradeX" align="center">
                                <td><input type="checkbox" <?php if($us->is_active) echo "checked"?> name="check[]"
                                value="{{$us->id}}"></td>
                                <td>{{$us->name}}</td>
								<td>{{$us->email}}</td>
								<td>{{$us->phonenumber}}</td>
                                <td align="center" <?php if($us->is_active) echo " style='color:blue'>OK ";else echo " style='color:red'>Blocked" ?> </td>
                                <td> <?php if($us->authority == 1) echo "Khách hàng"; else echo "Nhân viên"; ?> </td>
                                <td class="center">
                                    <a  href="{{ route('admin.user.getEdit', $us->id) }}"><i title="Chi tiết" class="fa fa-book fa-2x" aria-hidden="true"></i></a> -
                                    <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản này')" href="{{ route('admin.user.delete', $us->id) }}"><i title="Xóa" class="fa fa-trash-o fa-2x" aria-hidden="true"></i> </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                        <tr align="center">
                                <td><input class="btn btn-primary" type="submit" name="vai" value="Active"></td>
                                <td></td><td></td><td></td><td></td><td></td><td></td>
                        </tr>
                    </table>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
@endsection()

