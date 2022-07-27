<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laboratorium Multimedia ITERA') }}</title>

    <!-- WEBSITE ICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/ICON.png') }}" sizes="16x16">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- DataTable CSS -->
    <link rel="stylesheet" href="{{ asset('css/table/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/table/buttons.bootstrap4.min.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('css/table/autoFill.bootstrap4.min.css') }}"> --}}

    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('website.home') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('website.home') }}" class="brand-link">
                <img src="{{ asset('images/ITR_FIX.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    <span class="d-flex flex-column">
                        <span style="font-size: 8pt" class="d-block m-0">
                            Laboratorium Multimedia
                        </span>
                        <span style="font-size: 8pt" class="d-block m-0">
                            Institut Teknologi Sumatera
                        </span>
                    </span>
                </span>
            </a>
            @include('admin.layouts.navigation')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="pt-2 px-2">
                @include('admin.components.alert')
            </div>
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <nav class="p-3">
                {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                {{ __('Profil') }}
                            </p>
                        </a>
                    </li>

                    <div class="dropdown-divider"></div>

                    <li class="nav-item">
                        <a href="{{ route('admin.about') }}" class="nav-link">
                            <i class="nav-icon far fa-bell"></i>
                            <p>
                                {{ __('Notifikasi') }} 0
                            </p>
                        </a>
                        <div class="p-2 border w-100">
                            <p>Lorem ipsum dolor sit amet</p>
                            <p>Lorem ipsum dolor sit amet</p>
                            <p>Lorem ipsum dolor sit amet</p>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                </ul> --}}

                <div>
                    <form method="POST" action="{{ route('logout') }}" class="nav-link">
                        @csrf
                        <button class="btn btn-sm btn-danger btn-block" type="submit">Log Out</button>
                    </form>
                </div>
            </nav>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Institut Teknologi Sumatera
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{ date("Y") }} <a href="/">Laboratorium Multimedia</a></strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    @yield('modals')

    <!-- REQUIRED SCRIPTS -->
    {{-- <script src="{{ asset('js/jquery.slim.min.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/admin/index.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    {{-- <script src="{{ asset('js/adminlte.min.js') }}"></script> --}}

    <script src="{{ asset('js/table/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('js/table/autoFill.bootstrap4.min.js') }}"></script> --}}

    <script src="{{ asset('js/table/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/table/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/table/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/table/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/table/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/table/buttons.print.min.js') }}"></script>

    <script src="{{ asset('js/table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/table/vfs_fonts.js') }}"></script>


    <script src="{{ asset('js/table/jszip.min.js') }}"></script>

    <script src="{{ asset('js/others/sweetalert2.all.min.js') }}"></script>

    @yield('scripts')
</body>

</html>
