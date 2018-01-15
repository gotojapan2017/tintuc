<?php

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
use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

// Dang nhap Admin
Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/logout', 'UserController@getDangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function (){
    Route::group(['prefix'=>'theloai'], function (){
       // admin/theloai/danhsach
       Route::get('danhsach', 'TheLoaiController@getDanhsach');
       // admin/theloai/sua
       Route::get('sua/{id}','TheLoaiController@getSua');
       Route::post('sua/{id}','TheLoaiController@postSua'); 
       // admin/theloai/them
       Route::get('them', 'TheLoaiController@getThem');
       Route::post('them', 'TheLoaiController@postThem'); 
       // admin/theloai/xoa 
       Route::get('xoa/{id}','TheLoaiController@getXoa'); 
    });

    Route::group(['prefix'=>'loaitin'], function (){
        // admin/loaitin/danhsach
        Route::get('danhsach', 'LoaiTinController@getDanhsach');
        // admin/loaitin/sua
        Route::get('sua/{id}','LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');
        // admin/loaitin/them
        Route::get('them', 'LoaiTinController@getThem');
        Route::post('them', 'LoaiTinController@postThem');        
        // admin/loaitin/xoa
        Route::get('xoa/{id}','LoaiTinController@getXoa');
    });

    Route::group(['prefix'=>'tintuc'], function (){
        // admin/tintuc/danhsach
        Route::get('danhsach','TinTucController@getDanhsach');

        // admin/tintuc/them
        Route::get('them', 'TinTucController@getThem');
        Route::post('them', 'TinTucController@postThem');
        // admin/tintuc/sua
        Route::get('sua/{id}', 'TinTucController@getSua');
        Route::post('sua/{id}', 'TinTucController@postSua');
        // admin/tintuc/xoa
        Route::get('xoa/{id}', 'TinTucController@getXoa');
    });

    Route::group(['prefix'=>'comment'], function (){
        // admin/comment/xoa
        Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
    });

    Route::group(['prefix'=>'slide'], function (){
       // admin/slide/danhsach
       Route::get('danhsach', 'SlideController@getDanhsach');

       // admin/slide/them
       Route::get('them', 'SlideController@getThem');
       Route::post('them', 'SlideController@postThem');
       
       // admin/slide/sua
       Route::get('sua/{id}', 'SlideController@getSua'); 
       Route::post('sua/{id}', 'SlideController@postSua');
        
       // admin/slide/xoa
       Route::get('xoa/{id}', 'SlideController@getXoa');  
    });

    Route::group(['prefix'=>'ajax'], function (){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });

    Route::group(['prefix'=>'user'], function (){
       // admin/user/danhsach
        Route::get('danhsach', 'UserController@getDanhsach');
        
        // admin/user/them
        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');
        
        // admin/user/sua
        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');
        
        // admin/user/xoa
        Route::get('xoa/{id}', 'UserController@getXoa');
    });
});

// Front-end
Route::get('trangchu', 'PagesController@TrangChu');
Route::get('lienhe', 'PagesController@LienHe');
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@LoaiTin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@tintuc');
Route::get('dangnhap', 'PagesController@getDangnhap');
Route::post('dangnhap', 'PagesController@postDangnhap');
Route::get('dangxuat', 'PagesController@getDangxuat');
Route::get('nguoidung', 'PagesController@getNguoidung');
Route::post('nguoidung', 'PagesController@postNguoidung');
Route::get('dangky', 'PagesController@getDangky');
Route::post('dangky', 'PagesController@postDangky');
Route::post('timkiem', 'PagesController@postTimkiem');
Route::post('comment/{id}', 'CommentController@postComment');
   
