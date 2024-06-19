@extends('manager.layout')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Bang Cong</h2>
    </div>
    <br>

    <div class="card mb-8">
        <div class="card-body text-center">
            <img src="{{$user->avatar_url}}" style="width: 150px;">
            <h5 class="my-3">{{$user->name}}</h5>
            <p class="text-muted mb-1">{{$user->position_name}}</p>
            <p class="text-muted mb-4">{{$user->address}}</p>
        </div>
    </div>

    <table class="table align-middle mb-0 bg-white table-bordered display" id="users">
        <thead class="bg-light">
            <tr >
                <td>Day</td>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($working as $day)
            <tr>
                <td style="text-transform: uppercase">
                    {{ $day->created_at ? \Carbon\Carbon::parse($day->created_at)->format('d/m/Y') : '' }}
                </td>
                <td style="text-transform: uppercase">
                    {{ $day->start_time ? \Carbon\Carbon::parse($day->start_time)->format('H:i:s') : '' }}
                </td>
                <td style="text-transform: uppercase">
                    {{ $day->end_time ? \Carbon\Carbon::parse($day->end_time)->format('H:i:s') : '' }}
                </td>
                <td>{{ $day->total }}</td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateTotal_{{$day->id}}">
                        Edit
                    </button>
                    <div class="modal fade" id="modalUpdateTotal_{{$day->id}}" data-bs-backdrop="static"
                         data-bs-keyboard="false" tabindex="-1"
                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form method="POST" action="{{ route('process-edit-total', ['id' => $day->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        New Total<input class="form-control"  value="{{$day->total}}" type="text"  name="total" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" id="editButton_{{ $day->id }}" class="btn btn-primary" onclick="confirmAndUpdate_{{ $day->id }}(event)">Thay Đổi</button>

                                        {{--Script edit--}}
                                        <script>
                                            function confirmAndUpdate_{{ $day->id }}(event) {
                                                event.preventDefault();

                                                const result = confirm('Are you sure you want to update this level ?');

                                                if (result === true) {
                                                    event.target.form.submit();
                                                } else {
                                                    alert('Update level canceled!');
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <script>
        $(document).ready( function () {
            $('#users').DataTable();
        } );
    </script>


@endsection
