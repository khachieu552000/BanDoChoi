<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\ProductType;

class QLSanPhamController extends Controller
{
    public function index() {
        $sp = Product::orderBy('id', 'asc')->get();
        $viewData = [
            'sp' => $sp,
        ];
        return view('admin.SanPham.index', $viewData);
    }

    public function getAdd(){
        $danhmuc = ProductType::all();
        $viewData = [
            'danhmuc' => $danhmuc,
        ];
        return view('admin.SanPham.add', $viewData);
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'name.*' => 'required|unique:products,name',
            'id_type.*' => 'required',
            'unit_price.*' => 'required|numeric|min:0',
            'promotion_price.*' => 'required|numeric|min:0',
            'image.*' => 'image',
        ], [
            'name.*.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.*.unique' => 'Trùng tên sản phẩm',
            'id_type.*.required' => 'Bạn chưa chọn danh mục',
            'unit_price.*.required' => 'Bạn chưa điền giá',
            'promotion.*.required' => 'Bạn chưa điền giá khuyến mại',
            'image.*.image' => 'Hỉnh ảnh tải lên không đúng định dạng',
            'unit_price.*.numeric' => 'Hãy nhập số!',
            'promotion_price.*.numeric' => 'Hãy nhập số!',
            'unit_price.*.min' => 'Đơn giá nhập lớn hơn 0!',
            'promotion_price.*.min' => 'Đơn giá bán lớn hơn 0!',
        ]);
        $results = [];
        for ($i=0; $i < count($request->name); $i++) {
        $sp = new Product;
            $sp->id_type = $request->id_type[$i];
            $sp->name = $request->name[$i];
            $sp->description = $request->description[$i];
            $sp->unit_price = $request->unit_price[$i];
            $sp->promotion_price = $request->promotion_price[$i];
            $sp->new = $request->new[$i];
            $sp->save();
        }
        return redirect()->back()->with('thongbao', 'Thêm mới thành công!');
    }

    public function getEdit($id) {
        $sp = Product::find($id);
        $danhmuc = ProductType::all();
        $viewData = [
            'sp' => $sp,
            'danhmuc' => $danhmuc,
        ];
        return view('admin.SanPham.edit', $viewData);
    }

    public function postEdit(Request $request, $id) {
        $sp = Product::find($id);
        $this->validate($request, [
            'name' => 'required|unique:products,name,'.$id,
            'id_type' => 'required',
            'unit_price' => 'required|numeric|min:0',
            'promotion_price' => 'required|numeric|min:0',
            'image' => 'image',
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.unique' => 'Trùng tên sản phẩm',
            'id_type.required' => 'Bạn chưa chọn tên danh mục',
            'unit_price.required' => 'Bạn chưa điền giá ',
            'promotion.required' => 'Bạn chưa điền giá khuyến mại',
            'image.image' => 'Hỉnh ảnh tải lên không đúng định dạng',
            'unit_price.numeric' => 'Hãy nhập số!',
            'promotion_price.numeric' => 'Hãy nhập số!',
            'unit_price.min' => 'Đơn giá lớn hơn 0!',
            'promotion_price.min' => 'Đơn giá lớn hơn 0!',
        ]);

        $sp->id_type = $request->id_type;
        $sp->name = $request->name;
        $sp->description = $request->description;
        $sp->unit_price = $request->unit_price;
        $sp->promotion_price = $request->promotion_price;
        $sp->unit = $request->unit;
        $sp->new = $request->new;

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;

            while (file_exists("images/sanpham/" . $hinh)) {
                $hinh = Str::random(5) . "_" . Str::random(5) . "_" . $name;
            }

            $file->move( $hinh);
            $sp->image = $hinh;
        }

        $sp->save();
        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDelete($id) {
        Product::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }
}
