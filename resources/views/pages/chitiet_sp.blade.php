@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{ $sanpham->name }}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('index') }}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="../images/product/{{ $sanpham->image }}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title"><h3> {{ $sanpham->name }} </h3></p>
                            <p class="single-item-price">
                                @if ($sanpham->promotion_price != 0)
									<span class="flash-del">Giá: {{ number_format($sanpham->unit_price) }} vnđ</span> <br>
                                    <span class="flash-sale">{{ number_format($sanpham->promotion_price) }} vnđ</span>
                                @else
                                    <span>Giá: {{ number_format($sanpham->unit_price) }} vnđ</span> <br>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{ $sanpham->description }}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>Options:</p>
                        <div class="single-item-options">

                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{ route('themgiohang',$sanpham->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>


                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>

                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{ $sanpham->description }}</p>

                    </div>
                </div>
                <div class="space50">&nbsp;</div>

                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                        @foreach ($tuongtu as $tt)

                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <a href="product.html"><img src="../images/product/{{ $tt->image }}" height="300" width="270" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{ $tt->name }}</p>
                                    <p class="single-item-price">
                                        @if ($tt->promotion_price != 0)
											<span class="flash-del">Giá: {{ number_format($tt->unit_price) }} vnđ</span> <br>
                                            <span class="flash-sale">{{ number_format($tt->promotion_price) }} vnđ</span>
                                        @else
                                            <span>Giá: {{ number_format($tt->unit_price) }} vnđ</span> <br>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{ route('themgiohang',$tt->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{ route('chitiet',$tt->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Khuyến mại</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">

                            @foreach ($sl as $s)

                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('chitiet',$s->id) }}"><img src="../images/product/{{ $s->image }}" alt=""></a>
                                <div class="media-body">
                                    {{ $s->name }} <br>
                                    <span class="beta-sales-price">
                                  {{ number_format($s -> unit_price)  }} VNĐ
                                    </span>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>

        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
