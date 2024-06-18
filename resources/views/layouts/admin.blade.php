<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/skin-blue.min.css') }}">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  @livewireStyles
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    @include('layouts.include.admin.navbar')
    @include('layouts.include.admin.sidebar')

    <div class="content-wrapper">
      @yield('content')
    </div>

    @include('layouts.include.admin.footer')

  </div>


  <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
  <script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
  <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
  <script>
    $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  </script>
  @livewireScripts
  @stack('script')
</body>

</html>