@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách sản phẩm</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
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

    <div class="row">
        <div class="col-lg-12">
            <p>
                <a class="btn btn-primary" href="{{ route('admin.sanpham.getAdd') }}"> <i class="fa fa-plus"></i>
                    Thêm sản phẩm</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách sản phẩm
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Gía</th>
                                    <th>Gía khuyến mại</th>
                                    <th>new</th>
                                    <th>Chức năng</th>
                            </thead>
                            <tbody>
                                @if (isset($sp))
                                    <?php $i = 1; ?>
                                    @foreach ($sp as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                            </td>
                                            <td class="" style="font-weight: 600; color: rgb(231, 38, 38)">
                                                {{ $item->name }}</td>
                                            <td class="" style="">
                                                <img src="../images/product/{{ $item->image }}" alt="" srcset="" width="220px" height="150px"></td>
                                            <td class="" style="">
                                                @if ($item->type_products)
                                                    {{ $item->type_products->name }}
                                                @else
                                                    Không tồn tại
                                                @endif
                                            </td>

                                            <td class="" style="">{{ number_format($item->unit_price) }} VNĐ</td>
                                            <td class="" style="">{{ number_format($item->pomotion_price) }} VNĐ</td>
                                            <td class="" style="">{{ $item->new }}</td>
                                            <td class="center" style="text-align: center;">
                                                <a class="btn btn-success btn-xs btn-edit"
                                                    href="{{ route('admin.sanpham.getEdit', ['id' => $item->id]) }}"><i
                                                        class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.sanpham.getDelete', ['id' => $item->id]) }}"
                                                    onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('script')

@endsection
