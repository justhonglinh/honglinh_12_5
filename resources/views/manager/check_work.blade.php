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
            @foreach($employees as $employees)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="{{$employees->avatar_url}}"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle "
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{$employees->name}}</p>
                                <p class="text-muted mb-0">{{$employees->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$employees->position}}</p>
                        <p class="text-muted mb-0">Level :{{$employees->level}}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$employees->phone}}</p>
                    </td>
                    <td>{{$employees->address}}</td>

                    <td style="text-align: center">
                        <form method="POST" action="/manager/working_times/{{$employees->id}}">
                            @csrf

                            <label for="startDateTime">Ngày giờ bắt đầu:</label>
                            <br>
                            <input type="datetime-local" id="startDateTime" name="startDateTime">
                            <br><br>

                            <label for="endDateTime">Ngày giờ kết thúc:</label>
                            <br>
                            <input type="datetime-local" id="endDateTime" name="endDateTime">
                            <br><br>

                            <button type="submit">Tính</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
