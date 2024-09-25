<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ameen - Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/images/favicon.png') }}">
    <link href="{{ asset('admin_assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('admin_assets/js/modernizr-3.6.0.min.js') }}"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- jQuery (only include once) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<style>
    #toast-container {
        z-index: 99999999;
    }
</style>
<body class="v-light vertical-nav fix-header fix-sidebar">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/></svg>
        </div>
    </div>
    <div id="main-wrapper">
        <!-- header -->
        <div class="header">
            <div class="nav-header">
                <div class="brand-logo"><a href="index.html"><b><img src="{{ asset('admin_assets/images/logo.png') }}" alt=""> </b><span class="brand-title"><img src="{{ asset('admin_assets/images/logo-text.png') }}" alt=""></span></a>
                </div>
                <div class="nav-control">
                    <div class="hamburger"><span class="line"></span> <span class="line"></span> <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="header-content">
                <div class="header-left">
                </div>
                <div class="header-right">
                    <ul>
                        <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i></a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="#"><i class="mdi mdi-account"></i> <span>Profile</span></a>
                                        </li>
                                        <li><a href="#"><i class="icon-lock"></i> <span>Password</span></a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();"><i class="icon-power"></i> <span>Logout</span></a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #/ header -->
        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">

                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class=" mdi mdi-view-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class=" mdi mdi-view-dashboard"></i>
                            <span class="nav-text">Hospitals</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.departments.index')}}">
                            <i class=" mdi mdi-view-dashboard"></i>
                            <span class="nav-text">Departments</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class=" mdi mdi-view-dashboard"></i>
                            <span class="nav-text">Blogs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.contact-us.index')}}">
                            <i class=" mdi mdi-view-dashboard"></i>
                            <span class="nav-text">Contact us</span>
                        </a>
                    </li>

                    {{--
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false">
                            <i class="mdi mdi-chart-bar"></i>
                            <span class="nav-text">Charts</span>
                            <span class="badge badge-danger nav-badge">8</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="chart-flot.html">Flot</a>
                            </li>
                            <li>
                                <a href="chart-morris.html">Morris</a>
                            </li>
                        </ul>
                    </li>
                    --}}
                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->

        @yield('content')

        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

        <!-- footer -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; <a href="#">Ameen</a> 2018</p>
            </div>
        </div>
        <!-- #/ footer -->
    </div>
    <!-- Common JS -->
    <script src="{{ asset('admin_assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>
    <!-- Chartjs chart -->
    <script src="{{ asset('admin_assets/plugins/chartjs/Chart.bundle.js') }}"></script>
    <!-- Custom dashboard script -->
    <script src="{{ asset('admin_assets/js/dashboard-1.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
</body>

</html>
