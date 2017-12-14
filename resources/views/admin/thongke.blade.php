
@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thống kê
                        </h1>
                    </div>

                    <!-- /.col-lg-12 -->
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Chủ đề</th>
                                <th>Số lượng bài test</th>
                                <th>Số lượng bài test Actived</th>
                                <th>Số lượng bài test DisActive</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr class="odd gradeX" >
                            <?php $x=DB::table('topic')->where('name','=',$dt->name)->first()->id ;?> 
                            <td></i><a href="{{route('thongketest',$x)}}">{{$dt->name}}</a></td>
                            <td>{{$dt->soluong}}</td>  
                            <td><?php echo DB::table('test')->where('is_active','=',1)->Where('topic_id','=',DB::table('topic')->where('name','=',$dt->name)->first()->id)->count() ; ?></td>
                            <td><?php      
                             echo DB::table('test')->where('is_active','=',0)->Where('topic_id','=',DB::table('topic')->where('name','=',$dt->name)->first()->id)->count() ;?></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
