<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | @yield('title', 'Unknown page')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/adminlte.min.css')}}">
    {{-- other styles --}}
    @yield('styles')

    @if (app()->getLocale() == 'ar')
    <!-- RTL: style -->
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/adminlte-rtl.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/media-query-rtl.css')}}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,700" >

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @endif


</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">

    {{-- Navbar --}}
    @include('admin.include.navbar', ['setting' => \App\Models\Setting::where('id', 1)->first(['id'])])

    {{-- Sidebar --}}
    @include('admin.include.sidebar', ['setting' => \App\Models\Setting::where('id', 1)->first(['id'])])

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('page_name')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb {{app()->getLocale() == 'ar' ? "float-sm-left" : "float-sm-right"}}">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                            @yield('breadcrumb-item')
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- Footer --}}
    @include('admin.include.footer', ['setting' => \App\Models\Setting::where('id', 1)->first(['web_name'])])


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/js/demo.js')}}"></script>

    {{-- other scripts --}}
    @yield('scripts')
</body>
</html>





