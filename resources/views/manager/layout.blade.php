<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Site</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">
    <style>
        body {
            background-color: #fbfbfb;
        }
        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            padding: 58px 0 0; /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }
        .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <main>
            <header>
                <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                    <div class="position-sticky">
                        <div class="list-group list-group-flush mx-3 mt-4">
                            <a href="/manager/working_times" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fas fa-chart-area fa-fw me-3">
                                </i><span>Chấm Công</span>
                            </a>

                            <a href="/manager/employees" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Nhân viên </span>
                            </a>

                            <a href="/manager/analytics" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-chart-line fa-fw me-3"></i><span>History</span>
                            </a>

                            <a href="" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-lock fa-fw me-3"></i><span>Payment information</span>
                            </a>

                            <a href="/manager/level" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fas fa-chart-area fa-fw me-3">
                                </i><span>Level</span>
                            </a>

                            <a href="/manager/position" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fas fa-chart-area fa-fw me-3">
                                </i><span>Position</span>
                            </a>


                            <ul class="navbar-nav ms-auto d-flex flex-row">
                                <li class="nav-item dropdown">
                                    <div class="d-flex flex-row align-items-center justify-content-center">
                                        <form action="" class="me-3">
                                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                                        </form>

                                        <form method="post" action="{{route('logout')}}">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-dark me-2">Logout</button>
                                        </form>
                                    </div>

                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Sidebar -->

{{--                <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">--}}
{{--                    <div class="container-fluid">--}}

{{--                        <a class="navbar-brand" href="#">--}}
{{--                            <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="25"/>--}}
{{--                        </a>--}}
{{--                        <form class="d-none d-md-flex input-group w-auto my-auto">--}}
{{--                            <input--}}
{{--                                autocomplete="off"--}}
{{--                                type="search"--}}
{{--                                class="form-control rounded"--}}
{{--                                placeholder='Search (ctrl + "/" to focus)'--}}
{{--                                style="min-width: 225px;"--}}
{{--                            />--}}
{{--                            <span class="input-group-text border-0"><i class="fas fa-search"></i></span>--}}
{{--                        </form>--}}

{{--                        <ul class="navbar-nav ms-auto d-flex flex-row">--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <div class="d-flex flex-row align-items-center justify-content-center">--}}
{{--                                    <form action="" class="me-3">--}}
{{--                                        {{\Illuminate\Support\Facades\Auth::user()->name}}--}}
{{--                                    </form>--}}

{{--                                    <form method="post" action="{{route('logout')}}">--}}
{{--                                        @csrf--}}
{{--                                        <button type="submit" class="btn btn-outline-dark me-2">Logout</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}

{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </nav>--}}
            </header>

            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

