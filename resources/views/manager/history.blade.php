@extends('manager.layout')

@section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Bảng</h1>
        </div>
        <h2>Danh sách nhân viên</h2>
        <table class="table align-middle mb-0 bg-white" id="history">
            <thead class="bg-light">
                <tr >
                    <th>Name</th>
                    <th>Position</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total </th>
                    <th style="text-align: center">Actions</th>
                    <th></th>
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
                        <p class="fw-normal mb-1">{{$data->position_name}}</p>
                        <p class="text-muted mb-0">Level :{{$data->level_name}}</p>
                    </td>
                    <td style="text-align: center">
                        <p class="fw-normal mb-1">{{$data->phone}}</p>
                    </td>
                    <td style="text-align: center">{{$data->address}}</td>
                    <td style="align-content: center">{{$data->start_time}}</td>
                    <td style="align-content: center">{{$data->end_time}}</td>

                    <td style="text-align: center">
                        <h1>{{$data->total}}</h1>
                    </td>

                    <td style="text-align: center">
                        <a href="/manager/analytics/delete/{{$data->working_times_id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready( function () {
                $('#history').DataTable();
            });
        </script>

@endsection
