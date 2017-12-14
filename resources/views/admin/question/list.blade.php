@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">feedback
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <form action="{!! route('admin.question.active') !!}" method="POST" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">

                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Content</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($fb as $qs)
                            <tr class="odd gradeX" align="center">

                                <td>{{$qs->feedback_id}}</td>
                                <td></i><a href="{{URL::route('admin.question.getAdd',$qs->test_id)}}">{{$qs->name}}</a></td>
                                <td>{{$qs->email}}</td>
                                <td>{{$qs->content}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc muốn xóa feedback này')"
                                href="{{URL::route('admin.question.delete',$qs->feedback_id)}}"> Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection()

<script src="{{url('public/js/jquery-3.2.0.min.js')}}"></script>

<script type="text/javascript" src="{{url('public/js/mycript.js')}}"></script>
