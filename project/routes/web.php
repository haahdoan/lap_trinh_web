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

Route::get('/', function () {
    return view('welcome');
});

//admin đăng nhập, đăng xuất
Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangxuatAdmin');

//chức năng admin
Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function() {

    Route::group(['prefix'=>'post'], function(){
        Route::get('danhsach','PostController@getList');
        Route::get('chuadang','PostController@getChuaDang');
        Route::get('them', 'PostController@getAdd');
        Route::post('them','PostController@postAdd');
        Route::get('sua/{id}', 'PostController@getEdit');
        Route::post('sua/{id}', 'PostController@postEdit');
        Route::get('post/{id}', 'PostController@getPost');
        Route::get('xoa/{id}', 'PostController@getDelete');
        Route::get('xoachuadang/{id}', 'PostController@xoaChuaDang');
    });

    Route::group(['prefix'=>'comment'], function(){
        Route::get('xoa/{id}/{idpost}', 'CommentController@getDelete');
    });

    Route::group(['prefix'=>'user'], function(){
        Route::get('danhsach','UserController@getList');
        Route::get('them', 'UserController@getAdd');
        Route::post('them', 'UserController@postAdd');
        Route::get('sua/{id}', 'UserController@getEdit');
        Route::post('sua/{id}', 'UserController@postEdit');
        Route::get('xoa/{id}', 'UserController@getDelete');
    });
});

//trang chủ
Route::get('trangchu','PageController@trangchu');

//tỉnh
Route::get('tinh','PageController@gettinh');
Route::post('tinh','PageController@posttinh');

//hiển thị chi tiết bài viết
Route::get('post/{id}/{TenKhongDau}.html','PageController@post');

//đăng nhập
Route::get('dangnhap','PageController@getdangnhap');
Route::post('dangnhap','PageController@postdangnhap');

//đăng xuất
Route::get('dangxuat','PageController@dangxuat');

//thêm bình luận
Route::post('comment/{id}','CommentController@postComment');

//người dùng
Route::get('nguoidung','PageController@getnguoidung');
Route::post('nguoidung','PageController@postnguoidung');

//đăng ký
Route::get('dangky','PageController@getdangky');
Route::post('dangky','PageController@postdangky');

//tìm kiếm
Route::get('timkiem','PageController@gettimkiem');
Route::post('timkiem','PageController@posttimkiem');

//thêm bài viết
Route::get('thembaiviet', 'PageController@getAdd');
Route::post('thembaiviet','PageController@postAdd');
