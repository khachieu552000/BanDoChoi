@extends('admin.layouts.layout')
@section('head')
    <title>Danh mục sản phẩm</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục sản phẩm</h1>
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nhập sản phẩm mới
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.sanpham.postAdd') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="them-thuoc">
                                    <div class="form-group">
                                        <label for="id_type" style="color: red">Nhập sản phẩm 1</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_type">Danh mục</label>
                                        <select class="form-control" style="width: 30%" name="id_type"
                                            id="id_type">
                                            <option value="" disabled selected>--- Danh mục ---</option>
                                            @if (isset($danhmuc))
                                                @foreach ($danhmuc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên </label>
                                        <input class="form-control" id="name" name="name"
                                            placeholder="Nhập tên sản phẩm...">
                                    </div>


                                    <div class="form-group">
                                        <label for="unit_price">Gía (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="unit_price"
                                            name="unit_price" placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="promotion_price">Gía khuyến mại (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="promotion_price"
                                            name="promotion_price" placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="image">Hình ảnh sản phẩm</label>
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new">new</label>
                                        <input type="number" style="width: 30%" class="form-control" id="new"
                                            name="new" placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Ghi chú</label>
                                        <textarea class="form-control" id="description" name="description" placeholder=""
                                            rows="5"></textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary mb-2" value="Thêm">
                                <input type="reset" class="btn btn-default" value="Nhập lại" id="nhap-lai">
                                <a type="button" class="btn btn-success" value="Thêm sản phẩm" id="them-san-pham">Thêm sản
                                    phẩm</a>

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
    <script>
        i = 2
        temp = 0
        $('#them-san-pham').click(function() {
            html = `
            <hr>
            <hr>
            <div class="form-group">
                <label for="id_type_${temp}" style="color: red">Nhập sản phẩm ${i}</label>
            </div>
            <div class="form-group">
                                        <label for="id_type_${temp}">Danh mục</label>
                                        <select class="form-control" style="width: 30%" name="id_type[]"
                                            id="id_type_${temp}">
                                            <option value="" disabled selected>--- Danh mục ---</option>
                                            @if (isset($danhmuc))
                                                @foreach ($danhmuc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name_${temp}">Tên</label>
                                        <input class="form-control" id="name_${temp}" name="name[]"
                                            placeholder="Nhập tên sản phẩm...">
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_price_${temp}">Gía (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="unit_price_${temp}" name="unit_price[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="promotion_price_${temp}">Gía khuyến mại (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="promotion_price_${temp}" name="promotion_price[]"
                                            placeholder="Nhập giá khuyến mại" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="new_${temp}">New</label>
                                        <input type="number" style="width: 30%" class="form-control" id="new_${temp}" name="new[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="description_${temp}">Ghi chú</label>
                                        <textarea class="form-control" id="description_${temp}" name="description[]" placeholder=""
                                            rows="5"></textarea>
                                    </div>`
            $('#them-thuoc').append(html)
            i++
            temp++
        })
        $('#nhap-lai').click(function() {
            html = `
            <div class="form-group">
                <label for="id_type_${temp}" style="color: red">Nhập sản phẩm ${i}</label>
            </div>
            <div class="form-group">
                                        <label for="id_type_${temp}">Danh mục</label>
                                        <select class="form-control" style="width: 30%" name="id_type[]"
                                            id="id_type_${temp}">
                                            <option value="" disabled selected>--- Danh mục ---</option>
                                            @if (isset($danhmuc))
                                                @foreach ($danhmuc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name_${temp}">Tên</label>
                                        <input class="form-control" id="name_${temp}" name="name[]"
                                            placeholder="Nhập tên sản phẩm...">
                                    </div>

                                    <div class="form-group">
                                        <label for="unit_price_${temp}">Gía (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="unit_price_${temp}" name="unit_price[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="promotion_price_${temp}">Gía khuyến mại (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="promotion_price_${temp}" name="promotion_price[]"
                                            placeholder="Nhập giá khuyến mại" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="new_${temp}">New</label>
                                        <input type="number" style="width: 30%" class="form-control" id="new_${temp}" name="new[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="description_${temp}">Ghi chú</label>
                                        <textarea class="form-control" id="description_${temp}" name="description[]" placeholder=""
                                            rows="5"></textarea>
                                    </div>`
            $('#them-thuoc').html(html)
        })
    </script>
@endsection
