<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'SIAP Terpadu') }}</title>

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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Asisten Praktikum</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Pengumuman</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            {{-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link" data-toggle="dropdown" role="button">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-danger navbar-badge">15</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i>
                                4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i>
                                8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i>
                                3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </div>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button"><i
                            class="fas fa-th-large"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('website.home') }}" class="brand-link">
                <img src="{{ asset('images/letter-s.png') }}" alt="SIAP Terpadu Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIAP Terpadu</span>
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
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
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
                </ul>

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
                Teknik Informatika ITERA
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022 <a href="https://adminlte.io">SIAP Terpadu</a></strong>
        </footer>
    </div>
    <!-- ./wrapper -->

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
