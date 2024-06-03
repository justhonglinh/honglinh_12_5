<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap."></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <style id="apexcharts-css">@keyframes opaque {
                                   0% {
                                       opacity: 0
                                   }

                                   to {
                                       opacity: 1
                                   }
                               }

        @keyframes resizeanim {
            0%,to {
                opacity: 0
            }
        }


        .apexcharts-canvas ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 6px
        }

        .apexcharts-canvas ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0,0,0,.5);
            box-shadow: 0 0 1px rgba(255,255,255,.5);
            -webkit-box-shadow: 0 0 1px rgba(255,255,255,.5)
        }


        .apexcharts-text tspan {
            font-family: inherit
        }

        .apexcharts-tooltip * {
            font-family: inherit
        }


        .apexcharts-tooltip-box>div {
            margin: 4px 0
        }


        .apexcharts-menu-icon svg,.apexcharts-reset-icon svg,.apexcharts-zoom-icon svg,.apexcharts-zoomin-icon svg,.apexcharts-zoomout-icon svg {
            fill: #6e8192
        }

        .apexcharts-selection-icon svg {
            fill: #444;
            transform: scale(.76)
        }

        .apexcharts-theme-dark .apexcharts-menu-icon svg,.apexcharts-theme-dark .apexcharts-pan-icon svg,.apexcharts-theme-dark .apexcharts-reset-icon svg,.apexcharts-theme-dark .apexcharts-selection-icon svg,.apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg,.apexcharts-theme-dark .apexcharts-zoom-icon svg,.apexcharts-theme-dark .apexcharts-zoomin-icon svg,.apexcharts-theme-dark .apexcharts-zoomout-icon svg {
            fill: #f3f4f5
        }

        .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg,.apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,.apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg {
            fill: #008ffb
        }


        .apexcharts-pan-icon svg {
            fill: #fff;
            stroke: #6e8192;
            stroke-width: 2
        }

        .apexcharts-pan-icon.apexcharts-selected svg {
            stroke: #008ffb
        }


        .resize-triggers>div {
            height: 100%;
            width: 100%;
            background: #eee;
            overflow: auto
        }

        </style>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/manager/home" class="logo d-flex align-items-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="">
            <span class="d-none d-lg-block">Hồng Ling </span>
        </a>

        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar_url}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">
                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                    </span>

                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark me-2">Logout</button>
                    </form>
                </a><!-- End Profile Iamge Icon -->

            </li><!-- End Profile Nav -->

        </ul>
    </nav>

</header>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/manager/working_times">
                <i class="bi bi-grid"></i>
                <span>Chấm Công</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/manager/home">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Sales <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Customers <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</main><!-- End #main -->

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Manager Site</title>--}}
{{--    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap."></script>--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            background-color: #fbfbfb;--}}
{{--        }--}}
{{--        @media (min-width: 991.98px) {--}}
{{--            main {--}}
{{--                padding-left: 240px;--}}
{{--            }--}}
{{--        }--}}

{{--        /* Sidebar */--}}
{{--        .sidebar {--}}
{{--            position: fixed;--}}
{{--            top: 0;--}}
{{--            bottom: 0;--}}
{{--            left: 0;--}}
{{--            padding: 58px 0 0; /* Height of navbar */--}}
{{--            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);--}}
{{--            width: 240px;--}}
{{--            z-index: 600;--}}
{{--        }--}}

{{--        @media (max-width: 991.98px) {--}}
{{--            .sidebar {--}}
{{--                width: 100%;--}}
{{--            }--}}
{{--        }--}}
{{--        .sidebar .active {--}}
{{--            border-radius: 5px;--}}
{{--            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);--}}
{{--        }--}}

{{--        .sidebar-sticky {--}}
{{--            position: relative;--}}
{{--            top: 0;--}}
{{--            height: calc(100vh - 48px);--}}
{{--            padding-top: 0.5rem;--}}
{{--            overflow-x: hidden;--}}
{{--            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */--}}
{{--        }--}}
{{--    </style>--}}

{{--</head>--}}
{{--<body>--}}
{{--<div class="container-fluid">--}}
{{--    <div class="row">--}}
{{--        <main>--}}
{{--            <header>--}}
{{--                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">--}}
{{--                    <div class="position-sticky">--}}
{{--                        <div class="list-group list-group-flush mx-3 mt-4">--}}
{{--                            <a href="/manager/working_times" class="list-group-item list-group-item-action py-2 ripple ">--}}
{{--                                <i class="fas fa-chart-area fa-fw me-3">--}}
{{--                                </i><span>Chấm Công</span>--}}
{{--                            </a>--}}

{{--                            <a href="/manager/employees" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">--}}
{{--                                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Nhân viên </span>--}}
{{--                            </a>--}}

{{--                            <a href="/manager/history" class="list-group-item list-group-item-action py-2 ripple">--}}
{{--                                <i class="fas fa-chart-line fa-fw me-3"></i><span>History</span>--}}
{{--                            </a>--}}

{{--                            <a href="" class="list-group-item list-group-item-action py-2 ripple">--}}
{{--                                <i class="fas fa-lock fa-fw me-3"></i><span>Payment information</span>--}}
{{--                            </a>--}}

{{--                            <a href="/manager/level" class="list-group-item list-group-item-action py-2 ripple ">--}}
{{--                                <i class="fas fa-chart-area fa-fw me-3">--}}
{{--                                </i><span>Level</span>--}}
{{--                            </a>--}}

{{--                            <a href="/manager/position" class="list-group-item list-group-item-action py-2 ripple ">--}}
{{--                                <i class="fas fa-chart-area fa-fw me-3">--}}
{{--                                </i><span>Position</span>--}}
{{--                            </a>--}}


{{--                            <ul class="navbar-nav ms-auto d-flex flex-row">--}}
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <div class="d-flex flex-row align-items-center justify-content-center">--}}
{{--                                        <form action="" class="me-3">--}}
{{--                                            {{\Illuminate\Support\Facades\Auth::user()->name}}--}}
{{--                                        </form>--}}

{{--                                        <form method="post" action="{{route('logout')}}">--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" class="btn btn-outline-dark me-2">Logout</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}

{{--                                </li>--}}

{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </nav>--}}

{{--            </header>--}}
{{--            @yield('content')--}}
{{--        </main>--}}

{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}

