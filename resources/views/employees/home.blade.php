<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>

<nav class="py-2 bg-body-tertiary border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/employees/home" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/employees/history" class="nav-link link-body-emphasis px-2">Lịch sử</a></li>
            <li class="nav-item"><a href="/emplyees/payment" class="nav-link link-body-emphasis px-2">Bảng Lương</a></li>
            <li class="nav-item"><a href="/employees/bank" class="nav-link link-body-emphasis px-2">Ngân Hàng</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control form-control-dark text-bg-light" placeholder="Search..."
                   aria-label="Search" control-id="ControlID-1">
        </form>


        <div class="d-flex flex-row align-items-center justify-content-center">
            <form action="" class="me-3">
                {{\Illuminate\Support\Facades\Auth::user()->name}}
            </form>

            <form method="post" action="{{route('logout')}}">
                @csrf
                <button type="submit" class="btn btn-outline-dark me-2">Logout</button>
            </form>
        </div>
    </div>
</nav>

            <main >
                    <section style="background-color: #eee;">
                    <div class="container py-5">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar_url}}" alt="avatar"
                                             class="rounded-circle img-fluid" style="width: 150px;">
                                        <h5 class="my-3">                {{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                        @foreach($position as $pos)
                                            <p class="text-muted mb-1">
                                                Position: {{$pos->position_name}}
                                            </p>
                                        @endforeach


                                        @foreach($level as $lev)
                                            <p class="text-muted mb-4">
                                                Level :{{ $lev->level_name}}
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->phone}}</p>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{\Illuminate\Support\Facades\Auth::user()->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
            </main>
</body>
</html>
