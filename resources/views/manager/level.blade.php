@extends('manager.layout')

@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Bảng</h1>
        </div>

        <h2>Danh sách level </h2>
        <table class="table align-middle mb-0 bg-white">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateLevel">Thêm mới</button>

            <thead class="bg-light">
            <tr >
                <th>ID</th>
                <th>Level</th>
                <th>Salary Factor</th>
                <th>Quantity</th>
                <th style="text-align: center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($level as $level)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{$level->id}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{$level->level_name}}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$level->level_factor}}</p>
                    </td>
                    <td> Quantiy nhe !</td>

                    <td style="text-align: center">
                        <button class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateLevel_{{$level->id}}">
                            Edit
                        </button>

                        <a href="/level/delete/{{$level->id}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                {{--    <!-- Modal -->--}}
                {{--    {--edit--}}
                <div class="modal fade" id="modalUpdateLevel_{{$level->id}}" data-bs-backdrop="static"
                     data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="{{ route('process-edit-level', ['id' => $level->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa thông tin</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Name level<input class="form-control"  value="{{$level->level_name}}" type="text"  name="level_name" required>
                                    Salary Factor<input class="form-control mt-2" value="{{$level->level_factor}}" type="number" name="factor" min="1.0" step="0.1" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
            <!-- Modal -->
            {{--add--}}
            <div class="modal fade" id="modalCreateLevel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="{{route('process-add-level')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new level</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Name level<input class="form-control" type="text" value="" name="level_name" required>
                                Salary Factor<input class="form-control mt-2" type="number" name="factor" min="1.0" step="0.1" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </tbody>
        </table>
    </main>
@endsection
