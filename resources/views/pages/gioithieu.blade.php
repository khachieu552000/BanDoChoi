@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giới thiệu</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('index') }}">Trang chủ</a> / <span>Giới thiệu</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="our-history">
            <h2 class="text-center wow fadeInDown">Giới thiệu tổng quan</h2>
            <div class="space35">&nbsp;</div>

        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
