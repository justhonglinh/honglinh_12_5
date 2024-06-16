<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3/css/bootstrap.min.css')}}">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap."></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="py-2 bg-body-tertiary border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="/employees/home" class="nav-link link-body-emphasis px-2 active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/employees/history" class="nav-link link-body-emphasis px-2">Lịch sử</a></li>
            <li class="nav-item"><a href="/employees/payment" class="nav-link link-body-emphasis px-2">Bảng Lương</a></li>
            <li class="nav-item"><a href="/employees/bank" class="nav-link link-body-emphasis px-2">Ngân Hàng</a></li>
        </ul>

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

@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
