@extends('manager.layout')

@section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Bảng</h1>
        </div>

        <h2>Danh sách nhân viên</h2>
        <table class="table align-middle mb-0 bg-white" id="work">
            <thead class="bg-light">
            <tr >
                <td>ID</td>
                <th>Name</th>
                <th>Position</th>
                <th>Phone</th>
                <th>Address</th>
                <th style="text-align: center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $users)
                <tr>
                    <td>{{$users->id}}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img
                                src="{{$users->avatar_url}}"
                                alt=""
                                style="width: 45px; height: 45px"
                                class="rounded-circle "
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{$users->name}}</p>
                                <p class="text-muted mb-0">{{$users->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$users->position_name}}</p>
                        <p class="text-muted mb-0">Level :{{$users->level_name}}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$users->phone}}</p>
                    </td>
                    <td>{{$users->address}}</td>

                    <td style="text-align: center">
                        <form id="updateForm" method="POST" action="/manager/working_times/check/{{$users->id}}">
                            @csrf
                            <div>
                                <label for="startDateTime">Ngày giờ bắt đầu:</label>
                                <input type="time" id="startDateTime" name="start_time">
                            </div>
                            <br>

                            <div>
                                <label for="endDateTime">Ngày giờ kết thúc:</label>
                                <input type="time" id="endDateTime" name="end_time">
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary" onclick="confirmAndUpdate_{{$users->id}}(event)">Update</button>

                            <script>
                                function confirmAndUpdate_{{$users->id}}(event) {
                                    event.preventDefault();

                                    const result = confirm('Are you sure you want to update this working time?');

                                    if (result === true) {
                                        event.target.form.submit();
                                    } else {
                                        alert('Update working time canceled!');
                                    }
                                }
                            </script>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var startDateTimeField = document.getElementById('startDateTime{{$loop->iteration}}');
                                    var endDateTimeField = document.getElementById('endDateTime{{$loop->iteration}}');
                                    var currentDateTime = new Date().toISOString().slice(0, 16);
                                    startDateTimeField.value = currentDateTime;
                                    endDateTimeField.value = currentDateTime;
                                });
                            </script>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
        <script>
            $(document).ready( function () {
                $('#work').DataTable();
            } );
        </script>

@endsection
