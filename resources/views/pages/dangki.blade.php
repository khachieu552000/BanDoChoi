@extends('master')
@section('content')
<div class="container">
    <div id="content">

        <form action="{{ route('dangki') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>

                @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors ->all() as $er)
                    {{ $er }}
                    @endforeach
                </div>
                @endif

                @if(Session::has('Thanhcong'))
                    <div class="alert alert-success">{{ Session::get('Thanhcong') }}</div>
                @endif
                
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email *</label>
                        <input class="form-control" type="email" name="email" placeholder="Nhập email" required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Họ tên*</label>
                        <input class="form-control" type="text" name="name" placeholder="Nhập họ tên" required>
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input class="form-control" type="text" name="address" value="" placeholder="Nhập địa chỉ" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input class="form-control" type="text" name="phone" placeholder="Nhập SĐT" required>
                    </div>
                    <div class="form-block">
                        <label for="password">Mật Khẩu*</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu"  required>
                    </div>
                    <div class="form-block">
                        <label for="re_password">Nhập lại mật khẩu*</label>
                        <input class="form-control" type="password" name="re_password" placeholder="Nhập lại mật khẩu" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
