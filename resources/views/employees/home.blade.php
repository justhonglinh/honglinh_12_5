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
                                    <h5 class="my-3" style="text-transform:uppercase">
                                        {{\Illuminate\Support\Facades\Auth::user()->name}}
                                    </h5>
                                    <p class="text-muted mb-1" style="text-transform:uppercase">
                                        Position: {{$position->position_name}}
                                    </p>
                                    <p class="text-muted mb-4" style="text-transform:uppercase">
                                        Level :{{ $level->level_name}}
                                    </p>
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
