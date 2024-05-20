<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Site</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <h3 class="container">Quản Lý</h3>
                        <div class="list-group list-group-flush mx-3 mt-4">
                            <a href="/manager/working_times" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fa-solid fa-calendar-check me-3"></i>  <span>Chấm Công</span>
                            </a>

                            <a href="/manager/employees" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <i class="fa-solid fa-address-card me-3"> </i>  <span>Nhân viên </span>
                            </a>

                            <a href="/manager/analytics" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fa-solid fa-address-book me-3"></i>  <span>Phân Tích</span>
                            </a>

                            <a href="" class="list-group-item list-group-item-action py-2 ripple">
                                <i class="fas fa-lock fa-fw me-3"></i><span>TT thanh toán</span>
                            </a>

                            <a href="/manager/level" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fas fa-chart-area fa-fw me-3">
                                </i><span> Chức Vụ </span>
                            </a>

                            <a href="/manager/position" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fas fa-chart-area fa-fw me-3"></i><span>Position</span>
                            </a>

                            <a href="{{route('logout')}}" class="list-group-item list-group-item-action py-2 ripple ">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i><span>  Logout</span>
                            </a>

                        </div>
                    </div>
                </nav>

            </header>

            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
