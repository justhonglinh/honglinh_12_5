@extends('manager.layout')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng</h1>
    </div>

    <h2>Thông tin ngân hàng </h2>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr >
            <th>Name</th>
            <th>Position</th>
            <th>Bank Name</th>
            <th>Bank Number</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <div class="d-flex ">
                        <div class="ms-3">
                            <p class="fw-bold mb-1">{{$user->name}}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-muted mb-0">{{$user->position_name}}</p>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{$user->bank_name}}</p>
                </td>
                <td> {{$user->bank_number}}</td>
                <td> {{$user->salary}}$/1h</td>

                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#confirm_payment_{{ $user->id }}">
                        Pay
                    </button>
                </td>
            </tr>

            <div class="modal fade" id="confirm_payment_{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmation Payment for User {{ $user->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                <tr>
                                    <td>{{ $user->created_at ? \Carbon\Carbon::parse($user->start_time)->format('d/m/Y') : '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->start_time)->format('H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($user->end_time)->format('H:i:s') }}</td>
                                    <td style="text-align: center; text-transform: uppercase">{{ $user->total }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        </tbody>
    </table>
@endsection
