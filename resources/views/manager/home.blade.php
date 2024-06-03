@extends('manager.layout')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng</h1>
    </div>
    <h2>Danh sách nhân viên</h2>
    <br>
    <table class="table align-middle mb-0 bg-white" id="users">

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
                                Họ và tên<input class="form-control" value="{{$employees->name}}" name="name" required>
                                Số điện thoại<input class="form-control mt-2" value="{{$employees->phone}}" name="phone" required>
                                Địa chỉ<input class="form-control mt-2" value="{{$employees->address}}" name="address" required>
                                Ảnh <input class="form-control mt-2" type="file" name="avatar_url"  required accept="image/*">
                                Giới tính
                                <select class="form-select mt-2" aria-label="Default select example" name="gender">
                                    <option  value={{$employees->gender}} selected disabled>{{$employees->gender}}</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                                Vị trí
                                <select class="form-select mt-2" aria-label="Default select example" name="position">
                                    <option value={{$employees->position}} selected disabled>{{$employees->position_name}}</option>
                                    @foreach($position as $pos)
                                        <option value="{{ $pos->id }}">{{ $pos->position_name }}</option>
                                    @endforeach
                                </select>
                                Cấp bậc
                                <select class="form-select mt-2" aria-label="Default select example" name="level">
                                    <option value="{{$employees->level}}" selected disabled>{{$employees->level_name}}</option>
                                    @foreach($level as $lev)
                                        <option value="{{ $lev->id }}">{{ $lev->level_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" id="editButton" class="btn btn-primary">Thay Đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </tbody>
        <script>
            $(document).ready( function () {
                $('#users').DataTable();
            } );
        </script>
    </table>



{{----}}
            <!-- Modal -->
            {{--add--}}
        <div class="modal fade" id="modalCreateEmployees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(function(deleteButton) {
                deleteButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    const result = confirm('Are you sure you want to delete this employee?');

                    if (result === true) {
                        window.location.href = deleteButton.getAttribute('href');
                    } else {
                        alert('Delete operation canceled!');
                    }
                });
            });
        </script>

        <script>
            const addButton = document.getElementById('addButton');

            addButton.addEventListener('click', function() {
                // Hiển thị cảnh báo
                const result = confirm('Bạn có chắc chắn muốn thêm dữ liệu nhân viên mới?');
                if (result === true) {
                    alert('Dữ liệu mới đã được thêm thành công!');
                } else {
                    alert('Thêm dữ liệu mới đã bị hủy!');
                    addButton.disabled = true;
                }
            });
        </script>

        <script>
            const editButton = document.getElementById('editButton');

            editButton.addEventListener('click', function() {
                // Hiển thị cảnh báo
                const result = confirm('Bạn có chắc chắn muốn thay đổi dữ liệu nhân viên ?');
                if (result === true) {
                    alert('Dữ liệu mới đã được thêm thành công!');
                } else {
                    alert('Thêm dữ liệu mới đã bị hủy!');
                    editButton.disabled = true;
                }
            });
        </script>

@endsection


