<!DOCTYPE html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset("assets/backend/plugins/fontawesome-free/css/all.min.css") }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset("assets/backend/dist/css/adminlte.min.css") }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet"
              href="{{ asset("assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <!-- Styles -->
        @stack('style')
        <!-- Live Wire Style -->
        <livewire:styles />
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            @include('partials.layout.pre-loader')

            <!-- Navbar -->
            @include('partials.layout.header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset("img/logo.png") }}" alt="AdminLTE Logo"
                         class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ config("app.name") }}</span>
                </a>

                <!-- Sidebar -->
                @include('partials.layout.sidebar')
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="mt-5 pt-4">
                            @yield('content')
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021 <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.1
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->
        <!-- App JS -->
        <script src="{{ asset("js/app.js") }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset("assets/backend/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset("assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <!-- overlayScrollbars -->
        <script
            src="{{ asset("assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset("assets/backend/dist/js/adminlte.js") }}"></script>
        <!-- Script -->
        @stack('script')
        <!-- Live Wire Script -->
        <livewire:scripts />
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            @if(session()->has('success'))
                Toast.fire({
                    icon: 'success',
                    title:'{{ session()->get('success') }}'
                });
            @endif

            window.addEventListener('alert',({detail:{type,message}})=>{
                Toast.fire({
                    icon:type,
                    title:message
                })
            })
        </script>
    </body>
</html>
