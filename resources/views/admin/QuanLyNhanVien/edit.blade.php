@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa nhân viên</h1>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif
    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('thongbao') }}
        </div>
    @endif


    <div class="panel panel-default">
        <div class="panel-heading">
            Sửa nhân viên
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.nhanvien.postEdit', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name" value="{{ $user->employee->name }}"
                        autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email }}"
                        autocomplete="off" disabled />
                </div>

                <div class="form-group">
                    <label for="phone_number">Điện thoại</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Số điện thoại" name="phone_number" value="{{ $user->employee->phone_number }}"
                        autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="birthday">Ngày sinh</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $user->employee->birthday }}"
                        autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="gender">Giới tính</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="Nam"  >Nam</option>
                        <option value="Nữ" @if ($user->employee->gender == "Nữ") selected @endif>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $user->employee->address }}"
                        placeholder="Địa chỉ" />
                </div>

                <button type="submit" class="btn btn-primary mb-2">Sửa</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Đặt lại mật khẩu
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.nhanvien.getChangePassword', ['id' => $user->id]) }}" method="get">
                @csrf
                <label for="exampleFormControlInput1">Đặt lại mật khẩu về mặc định là: 12345678</label>
                <br>
                <button type="submit" class="btn btn-primary mb-2" onclick="return ConfirmResetPass()">Đặt lại mật
                    khẩu</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Xác nhận mật khẩu không đúng!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>

@endsection
