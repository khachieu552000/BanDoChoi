@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Địa chỉ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('index') }}">Trang chủ</a> / <span>Liên hệ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">

    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.195550833418!2d105.79664331533172!3d20.984796994652694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1624718389754!5m2!1svi!2s" ></iframe></div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <div class="space20">&nbsp;</div>
                <form action="#" method="post" class="contact-form">
                    <div class="form-block">
                        <input name="your-name" type="text" placeholder="Họ và tên">
                    </div>
                    <div class="form-block">
                        <input name="your-email" type="email" placeholder="Email">
                    </div>
                    <div class="form-block">
                        <input name="your-address" type="text" placeholder="Địa chỉ">
                    </div>
                    <div class="form-block">
                        <textarea name="your-message" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi liên hệ <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Địa chỉ</h6>
                <p>
                    Số 54, Triều Khúc, Thanh Xuân, Hà Nội
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Hỗ trợ trực tuyến</h6>
                <p>
                    Điện thoại: 0378642530 <br>
                   Email:
                    <a href="mailto:Hieu55200@gmail.com">Hieu55200@gmail.com</a>
                </p>

            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
