<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | AAPG Admin</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/admin/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="/admin/plugins/redactor/redactor.css">
  <link rel="stylesheet" href="/admin/plugins/redactor/plugins/filemanager/filemanager.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Website Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin" class="nav-link">Admin Dashboard</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
      <span class="brand-text font-weight-light">AAPG.ca</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="/admin/profile" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      @include('admin.partials.nav')
    </div>
  </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Website by <a href="https://tride.ca">Tride Media</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/admin/plugins/fastclick/fastclick.js"></script>
<script src="/admin/plugins/select2/select2.full.min.js"></script>
<script src="/admin/dist/js/adminlte.min.js"></script>
<script src="/conference/js/sweetalert2.all.min.js" type="text/javascript"></script>
<!-- Redactor -->
<script src="/admin/plugins/redactor/redactor.js"></script>
<script src="/admin/plugins/redactor/plugins/video/video.js"></script>
<script src="/admin/plugins/redactor/plugins/filemanager/filemanager.js"></script>
<script src="/admin/plugins/redactor/plugins/imagemanager/imagemanager.js"></script>
<script src="/admin/plugins/redactor/plugins/widget/widget.js"></script>
@yield('js')
@include('sweet::alert')
</body>
</html>
