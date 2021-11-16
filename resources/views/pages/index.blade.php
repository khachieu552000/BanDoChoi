@extends('master')
@section('content')

<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
		<div class="banner" >
			<ul>
                @foreach ($slide as $sl)

					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
							<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined"
								src="images/{{ $sl->image }}" data-src="images/{{ $sl->image }}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('images/{{ $sl->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>

					</li>
                    @endforeach

			</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
	<div class="col-sm-12">
		<div class="beta-products-list">
			<h4>Sản phẩm mới</h4>
			<div class="beta-products-details">
				<p class="pull-left">Có {{ count($new_product) }} sản phẩm</p>
				<div class="clearfix"></div>
			</div>

			<div class="row">

                @foreach ($new_product as $new)
				<div class="col-sm-3" style="height: 450px">
					<div class="single-item" >
						<div class="single-item-header">
							<a href=""><img src="images/product/{{ $new->image }}" height="300" width="270" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title">{{ $new->name }}</p>
							<p class="single-item-price">
								<span>Giá: {{ number_format( $new->unit_price) }} vnđ</span>
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{{ route('themgiohang',$new->id) }}"><i class="fa fa-shopping-cart"></i></a>
							<a class="beta-btn primary" href="{{ route('chitiet',$new->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
                @endforeach

			</div>


		</div> <!-- .beta-products-list -->

		<div class="space50">&nbsp;</div>

		<div class="beta-products-list">
			<h4>Sản phẩm khuyến mại</h4>
			<div class="beta-products-details">
				<p class="pull-left">Có {{ count($sale) }} sản phẩm</p>
				<div class="clearfix"></div>
			</div>
			<div class="row">
                @foreach ($sale as $s)

				<div class="col-sm-3" style="height: 450px">
					<div class="single-item">
						<div class="single-item-header">
							<a href="product.html"><img src="images/product/{{ $s->image }}" height="300" width="270" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title">{{ $s->name }}</p>
							<p class="single-item-price">
								<span class="flash-del">Giá: {{ number_format($s->unit_price) }} vnđ</span> <br>
                                <span class="flash-sale">{{ number_format($s->promotion_price) }} vnđ</span>
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{{ route('themgiohang',$s->id) }}"><i class="fa fa-shopping-cart"></i></a>
							<a class="beta-btn primary" href="{{ route('chitiet',$s->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
                @endforeach

			<div class="row"></div>
			</div>
		</div> <!-- .beta-products-list -->
	</div>
</div> <!-- end section with sidebar and main content -->


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> <!-- .container -->
@endsection
