
<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.header')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- ./wrapper -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" action="{{ route('postLogin') }}" method="POST" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" aria-invalid="false">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" aria-invalid="false">
                            </div>
                        </div>
                        @if (session('msg'))
                            <div class="form-group has-feedback"><a href="#" style="color: red">{{ session('msg') }}</a></div>
                        @endif
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/template/AdminLTE-3.1.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/template/AdminLTE-3.1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/template/AdminLTE-3.1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/AdminLTE-3.1.0/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/template/AdminLTE-3.1.0/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/template/AdminLTE-3.1.0/plugins/raphael/raphael.min.js"></script>
<script src="/template/AdminLTE-3.1.0/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/template/AdminLTE-3.1.0/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="/template/AdminLTE-3.1.0/plugins/chart.js/Chart.min.js"></script>
<script src="/template/AdminLTE-3.1.0/../laravel/template/AdminLTE-3.1.0/plugins/chart.js/Chart.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/template/AdminLTE-3.1.0/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/template/AdminLTE-3.1.0/dist/js/pages/dashboard2.js"></script>
</body>
</html>