@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Test
                            <small>List</small>
                        </h1>
                    </div>

                    <!-- /.col-lg-12 -->
                    <form action="{!! route('admin.test.active') !!}" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>Active</th>
                                <th>ID</th>
                                <th>Title</th>
																<th>By user</th>
                                <th>Is Active</th>
                                <th>Created Time</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($test as $ts)
                            <tr class="odd gradeX" >
                                <td align="center"><input type="checkbox" <?php
                                if($ts->is_active) echo "checked"
                                ?>
                                 name="check[]" value="{{$ts->test_id}}"></td>
                                <td align="center">{{$ts->test_id}}</td>
                                <td></i><a href="{{URL::route('admin.question.edit',$ts->test_id)}}">{{$ts->title}}</a></td>
                                <td>{{$ts->username}}</td>
																<td align="center" <?php if($ts->is_active) echo " style='color:blue'>Actived ";else echo " style='color:red'> No Active" ?></td>
                                <td>{{$ts->created_time}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc muốn xóa tất cả dữ liệu liên quan đến test này')" href="{{URL::route('admin.test.delete',$ts->test_id)}}"> Delete</a></td>
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
@endsection

