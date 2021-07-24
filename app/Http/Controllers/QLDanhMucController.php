<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class QLDanhMucController extends Controller
{
    public function index() {
        $danhmuc = ProductType::orderBy('id', 'asc')->get();
        $viewData = [
            'danhmuc' => $danhmuc,
        ];
        return view('admin.DanhMuc.index', $viewData);
    }

    public function postAdd(Request $request) {
        $this->validate($request,[
            'name' => 'required|unique:type_products,name',
        ], [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Trùng tên danh mục',
        ]);
        $danhmuc = new ProductType;
        $danhmuc->name = $request->name;
        $danhmuc->save();
        return redirect()->back()->with('thongbao', 'Thêm mới thành công!');
    }

    public function getEdit($id) {
        $danhmuc = ProductType::find($id);
        return response()->json(['data'=>$danhmuc],200);
    }

    public function postEdit(Request $request, $id) {
        $danhmuc = ProductType::find($id);
        $this->validate($request,[
            'name' => 'required|unique:type_products,name,'.$id,
        ], [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Trùng tên danh mục',
        ]);
        $danhmuc->name = $request->name;
        $danhmuc->save();
        return redirect()->back()->with('thongbao', 'Sửa thành công!');
    }

    public function getDelete($id) {
        ProductType::destroy($id);
        return redirect()->back()->with('thongbao', 'Xoá thành công!');
    }
}
