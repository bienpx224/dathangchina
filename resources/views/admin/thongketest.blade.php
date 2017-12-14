
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
                                <th>Tên bài test</th>
                                <th>Số lượng bài question</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($data as $dt)
                            <tr class="odd gradeX" >
                            
                            <td></i><a href="#">{{$dt->title}}</a></td>
                            <td>{{$dt->soluong}}</td>  
                            
                        @endforeach
                        </tbody>
                    </table>

                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
