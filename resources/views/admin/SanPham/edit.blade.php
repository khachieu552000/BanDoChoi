@extends('admin.layouts.layout')
@section('head')
    <title>Sửa sản phẩm</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa sản phẩm</h1>
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
                <a class="btn btn-primary" href="{{ route('admin.sanpham.index') }}"> <i class="fas fa-arrow-left"></i>
                    Quay lại danh sách</a>
            <p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Sửa sản phẩm
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.sanpham.postEdit', ['id'=>$sp->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="them-thuoc">
                                    <div class="form-group">
                                        <label for="id_type">Danh mục</label>
                                        <select class="form-control" style="width: 30%" name="id_type"
                                            id="id_type">
                                            <option value="" disabled selected>--- Danh mục ---</option>
                                            @if (isset($danhmuc))
                                                @foreach ($danhmuc as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $sp->id_type)
                                                            selected
                                                        @endif
                                                        >{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên</label>
                                        <input class="form-control" id="ten_thuoc" name="name"
                                            placeholder="Nhập tên thuốc..." value="{{ $sp->name }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="unit_price">Gía (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="unit_price"
                                            name="unit_price" placeholder="Nhập giá sản phẩm" value="{{ $sp->unit_price }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="promotion_price">Gía khuyến mại (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="promotion_price"
                                            name="promotion_price" placeholder="Nhập giá sản phẩm" value="{{ $sp->promotion_price }}" >
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="image">Hình ảnh sản phẩm</label>
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                            </div>
                                            <span>Xem trước: </span>
                                            <img id="blah" width="150px" height="150px" src="{{ asset($sp->image) }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new">New</label>
                                        <input type="number" style="width: 30%" class="form-control" id="new"
                                            name="new" placeholder="Nhập new sản phẩm"  value="{{ $sp->new }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Ghi chú</label>
                                        <textarea class="form-control" id="description" name="description" placeholder=""
                                            rows="5">{{ $sp->description }}</textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary mb-2" value="Sửa">
                                <input type="reset" class="btn btn-default" value="Nhập lại" id="nhap-lai">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection
