@extends('employees.layout_emp')

@section('content')
    <main>
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar_url}}" alt="avatar"
                                     class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3" style="text-transform:uppercase">
                                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                                    </h5>
                                    <p class="text-muted mb-1" style="text-transform:uppercase">
                                        Position: {{$position->position_name}}
                                    </p>
                                    <p class="text-muted mb-4" style="text-transform:uppercase">
                                        Level :{{ $level->level_name}}
                                    </p>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="checkIn()">Check In</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="checkOut()">Check Out</button>
                                    <script>
                                        function checkIn() {
                                            // Lấy thời gian hiện tại
                                            var currentTime = new Date().toLocaleTimeString();

                                            // Gửi yêu cầu POST để cập nhật start_time trong cơ sở dữ liệu
                                            $.ajax({
                                                url: '/update-working-time',
                                                type: 'POST',
                                                data: {
                                                    start_time: currentTime
                                                },
                                                success: function(response) {
                                                    alert('Checked In');
                                                },
                                                error: function(xhr, status, error) {
                                                    alert('Error: ' + error);
                                                }
                                            });
                                        }

                                        function checkOut() {
                                            // Lấy thời gian hiện tại
                                            var currentTime = new Date().toLocaleTimeString();

                                            // Gửi yêu cầu POST để cập nhật end_time trong cơ sở dữ liệu
                                            $.ajax({
                                                url: '/update-working-time',
                                                type: 'POST',
                                                data: {
                                                    end_time: currentTime
                                                },
                                                success: function(response) {
                                                    alert('Checked Out');
                                                },
                                                error: function(xhr, status, error) {
                                                    alert('Error: ' + error);
                                                }
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <table class="table" id="history">
                                <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col" style="text-align: center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($history as $day)
                                    <tr>
                                        <td style="text-transform: uppercase">{{ $day->start_time ? \Carbon\Carbon::parse($day->created_at)->format('d/m/Y') : '' }}</td>
                                        <td style="text-transform: uppercase">{{$day->start_time}}</td>
                                        <td style="text-transform: uppercase">{{$day->end_time}}</td>
                                        <td style="text-align:center;text-transform: uppercase">{{$day->total}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <script>
                                $(document).ready( function () {
                                    $('#history').DataTable();
                                } );
                            </script>

                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0" style="text-transform:uppercase">{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0" style="text-transform:uppercase">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0" style="text-transform:uppercase">{{\Illuminate\Support\Facades\Auth::user()->phone}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0" style="text-transform:uppercase">{{\Illuminate\Support\Facades\Auth::user()->address}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
@endsection
