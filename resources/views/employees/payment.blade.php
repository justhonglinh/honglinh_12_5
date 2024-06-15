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
                                     class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">                {{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                <p class="text-muted mb-1">
                                    Position: {{ $position->position_name }}
                                </p>
                                <p class="text-muted mb-1">
                                    Level: {{ $level->level_name }}
                                </p>
                                <p class="text-muted mb-1">
                                    Salary: {{ $position->salary }}$/1h
                                </p>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <table class="table" id="history">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center">Month</th>
                                <th scope="col" style="text-align: center">Total Time</th>
                                <th scope="col" style="text-align: center">Salary</th>
                                <th scope="col" style="text-align: center">Factor</th>
                                <th scope="col" style="text-align: center">Total Salary</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($monthlyTotals as $month => $total)
                                    <tr>
                                        <td style="text-align: center">{{ $month }}</td>
                                        <td style="text-align: center">{{ $total }} Hours</td>
                                        <td style="text-align: center">{{ $position->salary }} $/ 1 Hours</td>
                                        <td style="text-align: center">{{ $level->level_factor }}</td>
                                        <td style="text-align: center">{{ $total * $position->salary * $level->level_factor }} $</td>
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
