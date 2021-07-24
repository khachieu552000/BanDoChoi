<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', ['uses'=> 'WebController@getIndex'])->name('index');

Route::get('loaisp/{type}', ['uses'=> 'LoaispController@getLoaisp'])->name('loaisp');
Route::get('chitiet/{id}', ['uses'=> 'ChitietspController@getChitiet'])->name('chitiet');
Route::get('lienhe', ['uses' => 'LienheController@getLienhe'])->name('lienhe');
Route::get('gioithieu', ['uses' => 'GioithieuController@getGioithieu'])->name('gioithieu');
Route::get('themgiohang/{id}', ['uses'=>'ThemgiohangController@getThemgiohang'])->name('themgiohang');
Route::get('xoagiohang{id}', ['uses'=> 'XoagiohangController@getXoagiohang'])->name('xoagiohang');

Route::get('dathang', ['uses'=> 'DathangController@getDathang'])->name('dathang');
Route::post('dathang', ['uses' => 'DathangController@postDathang'])->name('dathang');

Route::get('timkiem', ['uses'=>'TimkiemController@getTimkiem'])->name('timkiem');

Route::get('dangki', ['uses'=>'DangkiController@getDangki'])->name('dangki');
Route::post('dangki', ['uses'=>'DangkiController@postDangki'])->name('dangki');

Route::get('dangnhap', ['uses'=>'DangnhapController@getDangnhap'])->name('dangnhap');
Route::post('dangnhap', ['uses'=>'DangnhapController@postDangnhap'])->name('dangnhap');
Route::get('dangxuat', ['uses'=>'DangxuatController@getDangxuat'])->name('dangxuat');
//Admin
    //Public Routes

    Route::get('admin/dang-nhap', ['uses'=>'AdminController@adminLogin'])->name('admin.login');
    Route::post('admin/dang-nhap', ['uses'=> 'AdminController@postAdminLogin'])->name('admin.postLogin');

    Route::group(['prefix'=>'admin', 'middleware'=>'admin.login'], function () {

        Route::get('/', ['uses' => 'AdminController@index'])->name('admin.index');
        Route::get('/dang-xuat', ['uses' => 'AdminController@adminLogout'])->name('admin.logout');

        Route::prefix('danh-muc')->group(function () {
            Route::get('/', ['uses' => 'QLDanhMucController@index'])->name('admin.DanhMuc.index');

            Route::post('/them', ['uses' => 'QLDanhMucController@postAdd'])->name('admin.DanhMuc.postAdd');

            Route::get('/sua/{id}', ['uses' => 'QLDanhMucController@getEdit'])->name('admin.DanhMuc.getEdit');
            Route::post('/sua/{id}', ['uses' => 'QLDanhMucController@postEdit'])->name('admin.DanhMuc.postEdit');

            Route::get('/xoa/{id}', ['uses' => 'QLDanhMucController@getDelete'])->name('admin.DanhMuc.getDelete');
        });

        Route::prefix('sanpham')->group(function () {
            Route::get('/', ['uses' => 'QLSanPhamController@index'])->name('admin.sanpham.index');

            Route::get('/them', ['uses' => 'QLSanPhamController@getAdd'])->name('admin.sanpham.getAdd');
            Route::post('/them', ['uses' => 'QLSanPhamController@postAdd'])->name('admin.sanpham.postAdd');

            Route::get('/sua/{id}', ['uses' => 'QLSanPhamController@getEdit'])->name('admin.sanpham.getEdit');
            Route::post('/sua/{id}', ['uses' => 'QLSanPhamController@postEdit'])->name('admin.sanpham.postEdit');

            Route::get('/xoa/{id}', ['uses' => 'QLSanPhamController@getDelete'])->name('admin.sanpham.getDelete');
        });

        Route::prefix('ds-hoa-don')->group(function () {
            Route::get('/', ['uses' => 'QLHoaDonController@index'])->name('admin.hoadonxuat.index');

        });

        Route::prefix('quan-ly-khach-hang')->group(function () {
            Route::get('/', ['uses' => 'QLKhachHangController@index'])->name('admin.khachhang.index');

        });


        Route::middleware(['admin.role'])->group(function () {

            Route::get('nhanvien/', ['uses' => 'QLNhanVienController@index'])->name('admin.nhanvien.index');

            Route::get('/them', ['uses' => 'QLNhanVienController@getAdd'])->name('admin.nhanvien.getAdd');
            Route::post('/them', ['uses' => 'QLNhanVienController@postAdd'])->name('admin.nhanvien.postAdd');

            Route::get('/sua/{id}', ['uses' => 'QLNhanVienController@getEdit'])->name('admin.nhanvien.getEdit');
            Route::post('/sua/{id}', ['uses' => 'QLNhanVienController@postEdit'])->name('admin.nhanvien.postEdit');

            Route::get('/xoa/{id}', ['uses' => 'QLNhanVienController@getDelete'])->name('admin.nhanvien.getDelete');

            Route::get('/lay-lai-mat-khau/{id}', ['uses' => 'QLNhanVienController@getChangePassword'])->name('admin.nhanvien.getChangePassword');
        });


    });

    Route::get('test', function () {
        return view('pages.mail_order');

    });




