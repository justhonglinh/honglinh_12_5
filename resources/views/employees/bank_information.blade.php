@extends('employees.layout_emp')

@section('content')
    <main >
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{\Illuminate\Support\Facades\Auth::user()->avatar_url}}" alt="avatar"
                                     class="rounded-circle img-fluid" style="width: 150px;text-transform:uppercase" >
                                <h5 class="my-3">                {{\Illuminate\Support\Facades\Auth::user()->name}}</h5>
                                    <p class="text-muted mb-1" style="text-transform:uppercase">
                                        Position: {{$position->position_name}}
                                    </p>

                                    <p class="text-muted mb-4" style="text-transform:uppercase">
                                        Level :{{ $level->level_name}}
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Display Full Name -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0" style="text-transform: uppercase;">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <!-- Display Bank Number -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Bank Number:</p>
                                </div>
                                <div class="col-sm-9">
                                    @if ($bank)
                                        <p class="text-muted mb-0" style="text-transform: uppercase;">{{ $bank->bank_number }}</p>
                                    @else
                                        <p class="text-muted mb-0">No bank information available</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <!-- Display Bank Name -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Bank Name:</p>
                                </div>
                                <div class="col-sm-9">
                                    @if ($bank)
                                        <p class="text-muted mb-0" style="text-transform: uppercase;">{{ $bank->bank_name }}</p>
                                    @else
                                        <p class="text-muted mb-0">No bank information available</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <!-- Bank Information Buttons -->
                            @if ($bank)
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditBankInformation">Edit Bank Information</button>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateBankInFormation">Add Bank Information</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
{{--add--}}
<div class="modal fade" id="modalCreateBankInformation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{route('process-add-bank')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm Ngân hàng mới</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" placeholder="Tên Ngân Hàng" name="name_bank" required>
                    <input class="form-control mt-2" type="text" placeholder="Number Bank" name="number_bank" required>
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
        const result = confirm('Bạn có chắc chắn muốn thêm dữ liệu ngân hàng mới?');
        if (result === true) {
            // Gửi biểu mẫu
            addButton.closest('form').submit();
        } else {
            alert('Thêm dữ liệu mới đã bị hủy!');
        }
    }
</script>

{{--edit--}}
<div class="modal fade" id="modalEditBankInformation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{route('process-edit-bank')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"> Ngân hàng mới</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" placeholder="Tên Ngân Hàng" name="name_bank" required>
                    <input class="form-control mt-2" type="text" placeholder="Number Bank" name="number_bank" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" id="editButton">Tạo mới</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const editButton = document.getElementById('editButton');
        editButton.addEventListener('click', function(event) {
        event.preventDefault();
        addEmployeeData();
    });

    function addEmployeeData() {
        // Hiển thị cảnh báo
        const result = confirm('Bạn có chắc chắn muốn thêm dữ liệu ngân hàng mới?');
        if (result === true) {
            // Gửi biểu mẫu
            editButton.closest('form').submit();
        } else {
            alert('Thêm dữ liệu mới đã bị hủy!');
        }
    }
</script>
