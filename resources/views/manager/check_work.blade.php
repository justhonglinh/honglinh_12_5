@extends('manager.layout')

@section('content')
    @if(session('check'))
    <div class="alert alert-success">
        {{ session('check') }}
    </div>
   @endif
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        </div>
        <h2>Check Working List</h2>
        <table class="table align-middle mb-0 bg-white" id="work">
            <thead class="bg-light">
            <tr >
                <th>Day start</th>
                <th>Day end</th>
                <th>Name</th>
                <th>Position</th>
                <th>Start time</th>
                <th>End Time</th>
                <th style="text-align: center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $users)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($users->start_time)->format('d/m/Y') }}</td>
                    <td>{{\Carbon\Carbon::parse($users->end_time)->format('d/m/y')}}</td><td>
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
                        {{$users->start_time}}
                    </td>
                    <td>
                        {{$users->end_time}}
                    </td>

                    <td style="text-align: center">
                        <form id="updateForm" method="POST" action="/manager/working_times/check/">
                            @csrf
                            <a href="/working_time/confirm/{{$users->id}}" class="btn btn-sm btn-primary">Confirm</a>
                            <a href="/working_time/edit/{{$users->id}}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/working_time/cancel/{{$users->id}}" class="btn btn-sm btn-danger">Cancel</a>
                            <br>

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
