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
                                @foreach($position as $pos)
                                    <p class="text-muted mb-1">
                                        Position: {{$pos->position_name}}
                                    </p>
                                    @foreach($level as $lev)
                                        <p class="text-muted mb-1">
                                            Level :{{ $lev->level_name}}
                                        </p>
                                    @endforeach
                                    <p class="text-muted mb-1">
                                        Salary :{{$pos->salary}}$/1h
                                    </p>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($history as $day)
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            {{ optional($datetime)->format('d/m/Y') }}
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
