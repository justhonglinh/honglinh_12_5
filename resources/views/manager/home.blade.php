@extends('manager.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Bảng</h1>
</div>
<h2>Danh sách nhân viên</h2>
<br>
<table class="table align-middle mb-0 bg-white table-bordered display" id="users">

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateEmployees">Thêm mới</button>

    <thead class="bg-light">
        <tr >
            <th>Name</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Address</th>
            <th style="text-align: center">Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($users as $employees)
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img
                        src="{{$employees->avatar_url}}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle "
                    />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{$employees->name}}</p>
                        <p class="text-muted mb-0">{{$employees->email}}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1">{{$employees->position_name}}</p>
                <p class="text-muted mb-0">Level :{{$employees->level_name}}</p>
            </td>
            <td>
                <p class="fw-normal mb-1">{{$employees->phone}}</p>
            </td>
            <td>{{$employees->address}}</td>
            <td style="text-align: center">
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateEmployees_{{ $employees->id }}">
                    Edit
                </button>
                <a href="/manager/employees/delete/{{ $employees->id }}" id="deleteButton" class="btn btn-danger">Delete</a>
            </td>
        </tr>


        {{--Update--}}
        <div class="modal fade" id="modalUpdateEmployees_{{$employees->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="POST" action="{{ route('process-edit-employees', ['id' => $employees->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa thông tin</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" value="{{$employees->name}}" name="name" required>
                            <input class="form-control mt-2" value="{{$employees->phone}}" name="phone" required>
                            <input class="form-control mt-2" value="{{$employees->address}}" name="address" required>
                            <input value="{{$employees->avatar_url}}" class="form-control mt-2" type="file" name="avatar_url"  required accept="image/*">

                            <select data-value="{{$employees->gender}}" class="form-select mt-2" aria-label="Default select example" name="gender" data-mce-placeholder="{{$employees->gender}}">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>

                            <select data-value="{{$employees->position}}" class="form-select mt-2" aria-label="Default select example" name="position" data-mce-placeholder="{{$employees->position}}">
                                @foreach($position as $pos)
                                    <option value="{{ $pos->id }}">{{ $pos->position_name }}</option>
                                @endforeach
                            </select>

                            <select data-value="{{$employees->level_name}}" class="form-select mt-2" aria-label="Default select example" name="level" data-mce-placeholder="{{$employees->level_name}}">
                                @foreach($level as $lev)
                                    <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" id="editButton_{{$employees->id}}" class="btn btn-primary">Thay Đổi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const editButton = document.getElementById('editButton_{{$employees->id}}');
            editButton.addEventListener('click', function(event) {
                event.preventDefault();
                editEmployeeData();
            });

            function editEmployeeData() {
                // Hiển thị cảnh báo
                const result = confirm('Bạn có chắc chắn muốn sửa dữ liệu nhân viên mới?');
                if (result === true) {
                    // Gửi biểu mẫu
                    editButton.closest('form').submit();
                } else {
                    alert('Sửa dữ liệu mới đã bị hủy!');
                }
            }
        </script>
    @endforeach
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#users').DataTable();
    } );
</script>
@endsection

{{--add--}}
<div class="modal fade" id="modalCreateEmployees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
                    <form method="POST" action="{{route('process-add-employees')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm nhân viên mới</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input class="form-control" placeholder="Họ và tên" name="name" required>
                                <input class="form-control mt-2" type="email" placeholder="Email" name="email" required>
                                <input class="form-control mt-2" type="password" placeholder="Mật khẩu" name="password" required>
                                <input class="form-control mt-2" placeholder="Số điện thoại" name="phone" required>
                                <input class="form-control mt-2" placeholder="Address" name="address" required>
                                <input class="form-control mt-2" type="file" name="avatar_url" required accept="image/*">

                                <select class="form-select mt-2" aria-label="Default select example" name="gender">
                                    <option selected disabled>Gender</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>

                                <select class="form-select mt-2" aria-label="Default select example" name="position">
                                    <option selected disabled>Position</option>
                                    @foreach($position as $pos)
                                        <option value="{{ $pos->id }}">{{ $pos->position_name }}</option>
                                    @endforeach
                                </select>

                                <select class="form-select mt-2" aria-label="Default select example" name="level">
                                    <option selected disabled>Level</option>
                                    @foreach($level as $lev)
                                        <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary" id="addButton">Tạo mới</button>
                            </div>
                        </div>
                    </form>
                </div>
</div>
<script>
    const addButton = document.getElementById('addButton');
    addButton.addEventListener('click', function(event) {
        event.preventDefault();
        addEmployeeData();
    });

    function addEmployeeData() {
        // Hiển thị cảnh báo
        const result = confirm('Bạn có chắc chắn muốn thêm dữ liệu nhân viên mới?');
        if (result === true) {
            // Gửi biểu mẫu
            addButton.closest('form').submit();
        } else {
            alert('Thêm dữ liệu mới đã bị hủy!');
        }
    }
</script>

{{--delete--}}
<script>
    const deleteButton = document.getElementById('deleteButton');
    deleteButton.addEventListener('click', function(event) {
        event.preventDefault();
        deleteEmployeeData();
    });

    function deleteEmployeeData() {
        // Hiển thị cảnh báo
        const result = confirm('Bạn có chắc chắn muốn xóa nhân viên này?');
        if (result === true) {
            // Gửi biểu mẫu
            window.location.href = deleteButton.getAttribute('href');
        } else {
            alert('Xóa nhân viên đã bị hủy!');
        }
    }
</script>

