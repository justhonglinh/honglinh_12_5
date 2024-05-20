@extends('manager.layout')

@section('content')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bảng</h1>
            </div>
            <h2>Danh sách nhân viên</h2>
            <table class="table align-middle mb-0 bg-white">
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
                @foreach($users as $users)
                    <tr>
                        <td>
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
                            <p class="fw-normal mb-1">{{$users->phone}}</p>
                        </td>
                        <td>{{$users->address}}</td>

                        <td style="text-align: center">
                            <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalUpdateEmployees_{{$users->id}}">
                                Edit
                            </button>

                            <a href="/manager/employees/delete/{{$users->id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>


                {{--    <!-- Modal -->--}}
                {{--    {--edit--}}
                <div class="modal fade" id="modalUpdateEmployees_{{$users->id}}" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action="{{ route('process-edit-employees', ['id' => $users->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sửa thông tin</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Họ và tên
                                    <input class="form-control" value="{{ $users->name }}" name="name" required>

                                    Email
                                    <input class="form-control mt-2" type="email" value="{{ $users->email }}" name="email" required>

                                    Password
                                    <input class="form-control mt-2" type="password"  name="password" required>

                                    Số điện thoại
                                    <input class="form-control mt-2" value="{{ $users->phone }}" name="phone" required>

                                    Địa chỉ
                                    <input class="form-control mt-2" value="{{ $users->address }}" name="address" required>

                                    Ảnh
                                    <input class="form-control mt-2" type="file" name="avatar_url" required accept="image/*">

                                    Giới tính
                                    <select class="form-select mt-2" aria-label="Default select example" name="gender" >
                                        <option selected disabled>Gender</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>

                                    Vị trí
                                    <select class="form-select mt-2" aria-label="Default select example" name="position">
                                        <option selected disabled>Position</option>
                                        @foreach ($position as $pos)
                                            <option value="{{ $pos->id }}" {{ $users->position_name == $pos->position_name ? 'selected' : '' }}>{{ $pos->position_name }}</option>
                                        @endforeach
                                    </select>
                                    Cấp bậc
                                    <select class="form-select mt-2" aria-label="Default select example" name="level">
                                        <option selected disabled>Level</option>
                                        <option value="default" {{ old('level') == "default" ? 'selected' : '' }}>Default Value</option>
                                        @foreach($level as $item)
                                            <option value="{{ $item->id }}" {{ old('level') == $item->id ? 'selected' : '' }}>{{ $item->level_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-primary">Thay Đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
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

                                        <select class="form-select mt-2" aria-label="Default select example" name="gender" >
                                            <option selected disabled>Gender</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>

                                        <select class="form-select mt-2" aria-label="Default select example" name="position">
                                            <option selected disabled>Position</option>
                                            @foreach($position as $position)
                                                <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                                            @endforeach
                                        </select>

                                        <select class="form-select mt-2" aria-label="Default select example" name="level" >
                                            <option selected disabled>Level</option>
                                            @foreach($level as $level)
                                                <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                                            @endforeach
                                        </select>


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

