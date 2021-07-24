@extends('master')
@section('content')
<div class="container">
    <div id="content">

        <form action="{{ route('dangnhap') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                @if (Session::has('flag'))
                <div class="alert alert-{{ Session::get('flag') }}">{{ Session::get('message') }}</div>
                @endif
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Tài khoản*</label>
                        <input class="form-control" type="email" name="email" placeholder="Nhập email..." required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Mật khẩu*</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu..." required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
