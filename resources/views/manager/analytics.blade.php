@extends('manager.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Bảng</h1>
        </div>
        <h2>Danh sách nhân viên</h2>
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
            <tr >
                <th>Name</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Address</th>
                <th style="text-align: center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $data)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="{{$data->avatar_url}}"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle "
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{$data->name}}</p>
                                <p class="text-muted mb-0">{{$data->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$data->position}}</p>
                        <p class="text-muted mb-0">Level :{{$data->level}}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$data->phone}}</p>
                    </td>
                    <td>{{$data->address}}</td>

                    <td style="text-align: center">
                        @if($minutes > 50)
                            {{ $new = $hours+1}}
                        @endif
                        <p>Total Time: {{ $new }} hours, {{ $minutes }} minutes, {{ $seconds }} seconds</p>
                    </tr>

            @endforeach


            </tbody>
        </table>

    </main>
@endsection
