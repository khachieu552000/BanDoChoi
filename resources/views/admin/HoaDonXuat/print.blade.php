<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hóa đơn</title>
</head>
<body>
      <!-- Styles -->
      <style>
        body {
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .header{
            text-align: center;
            margin-bottom: 50px;
        }

        .title {
            text-align: center;
            margin-top: 20px;
        }
        table {
            margin: 0 auto;
            font-size: 18px;
            margin-bottom: 30px;
        }
        #chi-tiet {
            border-collapse: collapse;
        }
        #chi-tiet,#chi-tiet th,#chi-tiet td {
            border: 1px solid black;
            padding: 5px 10px;
            font-size: 14px;
        }

        .tr-nhap, .tr-nhap td {
            border: 1px solid black;
            padding: 10px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
   <div class="header">
       <h1>HOÁ ĐƠN </h1>
   </div>

   <div class="main">
        <table>
            <tr>
                <td>Mã hoá đơn: </td>
                <th style="padding-left: 30px; color: rgb(119, 0, 0); text-align: left;">HDX{{$hdx->id}}</th>
            </tr>
            <tr>
                <td>Khách hàng: </td>
                <th style="padding-left: 30px; text-align: left;">{{$hdx->customer?$hdx->customer->name:''}}</th>
            </tr>
            {{-- <tr>
                <td>Nhân viên bán: </td>
                <th style="padding-left: 30px; text-align: left;">{{$hdx->nhan_vien?$hdx->nhan_vien->ho_ten:''}}</th>
            </tr> --}}
            <tr>
                <td>Ngày lập: </td>
                <th style="padding-left: 30px; text-align: left;">{{date('d-m-Y', strtotime($hdx->date_order))}}</th>
            </tr>
            <tr>
                <td>Tổng tiền: </td>
                <th style="padding-left: 30px; text-align: left;">{{number_format($hdx->total)}}</th>
            </tr>
    </table>

    <div class="title">
        <h3>CHI TIẾT HOÁ ĐƠN</h3>
    </div>
    <table id="chi-tiet">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th></th>
                <th>Đơn giá</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($cthdx))
                <?php $i = 1; ?>
                @foreach ($cthdx as $item)
                    <tr class="tr-nhap">
                        <td>{{$i++}}</td>
                        <td>{{ $item->product?$item->product->name:'' }}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format($item->unit_price)}} VNĐ</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
   </div>
    
</body>
</html>

