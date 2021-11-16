@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h5 class="inner-title">{{ $loai_sp->name }}</h5>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('index') }}">Trang chủ</a> / <span>{{ $loai_sp->name }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
                            @foreach ($loai as $l)
							<li><a href="{{ route('loaisp',$l->id) }}">{{ $l->name }}</a></li>
                            @endforeach

						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh sách sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{ count($sptheoloai) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach ($sptheoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="#"><img src="../images/product/{{ $sp->image }}" height="300" width="270" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $sp->name }}</p>
											<p class="single-item-price">
                                                @if ($sp->promotion_price != 0)
												<span class="flash-del">Giá: {{ number_format($sp->unit_price) }} vnđ</span> <br>
                                                <span class="flash-sale">{{ number_format($sp->promotion_price) }} vnđ</span>
                                                @else
                                                <span>Giá: {{ number_format($sp->unit_price) }} vnđ</span> <br>
                                                @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$sp->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitiet',$sp->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
                                @endforeach

							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>


					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
