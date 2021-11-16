@extends('admin.layouts.layout')

@section('head')
    <title>Hóa đơn</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách hoá đơn</h1>
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
                    Danh sách hoá đơn
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hoá đơn</th>
                                    <th>Họ tên khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($hoadonxuat))
                                    <?php $i = 1;
                                   ?>
                                    @foreach ($hoadonxuat as $item)
                                        @if (isset($item->customer))
                                            <tr class="odd gradeX">
                                                <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                                </td>
                                                <td style="text-align: center; color: red"> <b> {{ $item->id }}</b></td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->total }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->date_order)) }}</td>
                                                <td><a class="btn btn-success btn-xs"
                                                    href="{{ route('admin.hoadonxuat.in', ['id' => $item->id]) }}"><i class="fa fa-print"></i> In hoá đơn</a></td>
                                            </>
                                        @endif
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
    @include('admin.DanhMuc.modal_add')
    @include('admin.DanhMuc.modal_edit')

@endsection

@section('script')

    <script>
        $('.btn-edit').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-edit').modal('show');
            e.preventDefault();
            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function(response) {
                    //đưa dữ liệu controller gửi về điền vào input trong form edit.
                    $('#name-edit').val(response.data.name);
                    $('#name-lsp').val(response.name);
                    //thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
                    $('#form-edit').attr('action', '{{ asset('admin/danh-muc/sua/') }}/' +
                        response.data
                        .id)
                },
                error: function(error) {

                }
            })
        })
    </script>

@endsection
