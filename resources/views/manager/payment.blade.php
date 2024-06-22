@extends('manager.layout')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng</h1>
    </div>

    <h2>Quyết Toán Lương Tháng :{{$month}}</h2>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
        <tr >
            <th>Name</th>
            <th>Bank Name</th>
            <th>Bank Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <div class="d-flex">
                        <div class="ms-3">
                            <p class="fw-bold mb-1">{{ $user->name }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    <p class="fw-normal mb-1">{{ $user->bank_name }}</p>
                </td>
                <td>{{ $user->bank_number }}</td>
                <td>

                        <a href="/manager/settlement/{{$user->id}}" class="btn btn-sm btn-primary">Pay</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
