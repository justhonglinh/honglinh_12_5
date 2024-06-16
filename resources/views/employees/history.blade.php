@extends('employees.layout_emp')

@section('content')
    <main >
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar_url}}" alt="avatar"
                                     class="rounded-circle img-fluid" style="width: 150px;text-transform:uppercase">
                                    <h5 class="my-3" style="text-transform: uppercase">
                                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                                    </h5>
                                    <p class="text-muted mb-1" style="text-transform:uppercase">
                                        Position: {{$position->position_name}}
                                    </p>
                                    <p class="text-muted mb-1" style="text-transform:uppercase">
                                        Level: {{ $level->level_name}}
                                    </p>
                                    <p class="text-muted mb-1" style="text-transform:uppercase">
                                        Salary: {{$position->salary}}$/1h
                                    </p>

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
                </div>
            </div>
        </section>
    </main>
@endsection
