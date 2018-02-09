<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dat hang China">
    <meta name="author" content="Pham Xuan Bien - Bach khoa">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
     <link rel="icon" type="image/png" href="{{ asset('public/img/logo.png') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('public/admin_css/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('public/admin_css/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('public/admin_css/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{url('public/admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{url('public/admin_css/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">

    <script src="{{url('public/js/jquery-3.2.0.min.js')}}"></script>

    <script type="text/javascript" src="{{url('public/js/mycript.js')}}"></script>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url('public/admin_css/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('public/admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('public/admin_css/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('public/admin_css/dist/js/sb-admin-2.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{url('public/admin_css/bower_components/DataTables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{url('public/admin_css/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <!-- TOAST -->
    <link rel="stylesheet" href="{{ asset('public/inspinia/css/plugins/toastr/toastr.min.css') }}" media="all" type="text/css">
    <script src="{{asset('public/inspinia/js/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</head>

<body>

    <div id="wrapper">

        @include('admin.layout.header')


        @yield('content')

    </div>
    

    @yield('script')

</body>

</html>
