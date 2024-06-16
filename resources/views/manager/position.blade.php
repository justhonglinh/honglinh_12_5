@extends('manager.layout')

@section('content')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Bảng</h1>
        </div>

        <h2>Danh sách Position </h2>
        <table class="table align-middle mb-0 bg-white">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateLevel">Thêm mới</button>

            <thead class="bg-light">
            <tr >
                <th>ID</th>
                <th>Position</th>
                <th>Salary</th>
                <th style="text-align: center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($position as $position)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{$position->id}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{$position->position_name}}</p>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$position->salary}}/1 hours</p>
                    </td>

                    <td style="text-align: center">
                        <button class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#modalUpdatePosition_{{$position->id}}">
                            Edit
                        </button>

                        <a href="/position/delete/{{$position->id}}" class="btn btn-danger" onclick="confirmDelete(event)">Delete</a>
                        {{--Script Delete--}}
                        <script>
                            function confirmDelete(event) {
                                event.preventDefault();

                                const result = confirm('Are you sure you want to delete this position?');

                                if (result === true) {
                                    window.location.href = event.target.href;
                                } else {
                                    alert('Delete canceled!');
                                }
                            }
                        </script>
                    </td>
                </tr>
                {{--    <!-- Modal -->--}}
                {{--    {--edit--}}
                <div class="modal fade" id="modalUpdatePosition_{{$position->id}}" data-bs-backdrop="static"
                     data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="{{ route('process-edit-position', ['id' => $position->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa thông tin</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Name level<input class="form-control"  value="{{$position->position_name}}" type="text"  name="position_name" required>
                                    Salary Factor<input class="form-control mt-2" value="{{$position->salary}}" type="number" name="salary" min="1.0" step="1" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" id="editButton_{{ $position->id }}" class="btn btn-primary" onclick="confirmAndUpdate_{{ $position->id }}(event)">Thay Đổi</button>
                                    {{--Script edit--}}
                                    <script>
                                        function confirmAndUpdate_{{ $position->id }}(event) {
                                            event.preventDefault();

                                            const result = confirm('Are you sure you want to position this level ?');

                                            if (result === true) {
                                                event.target.form.submit();
                                            } else {
                                                alert('Update position canceled!');
                                            }
                                        }
                                    </script>
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
                    <form method="POST" action="{{route('process-add-position')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add new level</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Name level<input class="form-control" type="text" value="" name="position_name" required>
                                Salary <input class="form-control mt-2" type="number" name="salary" min="1.0" step="0.1" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" id="addButton" class="btn btn-primary" onclick="addPositionData(event)">Tạo mới</button>
                                {{--Script add--}}
                                <script>
                                    function addPositionData(event) {
                                        event.preventDefault();

                                        // Hiển thị cảnh báo
                                        const result = confirm('Bạn có chắc chắn muốn thêm dữ liệu Position mới?');
                                        if (result === true) {
                                            // Gửi biểu mẫu
                                            event.target.form.submit();
                                        } else {
                                            alert('Thêm dữ liệu mới đã bị hủy!');
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </tbody>
        </table>
@endsection
