@extends('manager.layout')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>
    <h2>Danh sách Cô</h2>
    <br>
    <table class="table align-middle mb-0 bg-white table-bordered display" id="users">
            <thead>
            <tr>
                <th scope="col">Day</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col" style="text-align: center">Total</th>
                <th scope="col" style="text-align: center">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($times as $day)
                <tr>
                    <td style="text-transform: uppercase">{{ $day->created_at ? \Carbon\Carbon::parse($day->created_at)->format('d/m/Y') : '' }}</td>

                    <td style="text-transform: uppercase">
                        {{ \Carbon\Carbon::parse($day->start_time)->format('H:i:s') }}
                    </td>

                    <td style="text-transform: uppercase">
                        {{ \Carbon\Carbon::parse($day->end_time)->format('H:i:s') }}
                    </td>
                    <td style="text-align:center;text-transform: uppercase">{{$day->total}}</td>
                    <td style="text-align: center; text-transform: uppercase;">
                        @if($day->status == 1)
                            Chưa chấp nhận
                        @elseif($day->status == 2)
                            Chấp nhận
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>

    </table>

    <h2>Bank :{{$bank->bank_name}}</h2>
    <h2>Bank Number :{{$bank->bank_number}}</h2>
    <h2>
        Tong Thoi gian Thang nay la :{{ $total * $position->salary * $level->level_factor }} $
    </h2>
    <a href="/pay/{{$users}}/{{ $total * $position->salary * $level->level_factor }}" class="btn btn-sm btn-primary">Confirm pay</a>


    <script>
        $(document).ready( function () {
            $('#users').DataTable();
        } );
    </script>



@endsection
