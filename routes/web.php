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
use App\LoaiTin;
use App\TinTuc;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');
Route::get('admin/logout','UserController@getdangxuatAdmin');
Route::get('/check', 'UserController@userOnlineStatus');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'loaitin'],function(){
		//admin/loaitin/danhsach
		Route::get('danhsach','LoaiTinController@getDanhsach');

		Route::get('sua/{id}','LoaiTinController@getSua');

		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');

		Route::post('them','LoaiTinController@postThem');
		Route::get('xoa/{id}','LoaiTinController@getXoa');

	});

	Route::group(['prefix'=>'tintuc'],function(){
		//admin/tintuc/danhsach
		Route::get('danhsach','TinTucController@getDanhsach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');
		Route::get('xoa/{id}','TinTucController@getXoa');

	});
	Route::group(['prefix'=>'slide'],function(){
		//admin/tintuc/danhsach
		Route::get('danhsach','SlideController@getDanhsach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');
		Route::get('xoa/{id}','SlideController@getXoa');

	});
	Route::group(['prefix'=>'thongbao'],function(){
		//admin/tintuc/danhsach
		Route::get('danhsach','ThongBaoController@getDanhsach');

		Route::get('sua/{id}','ThongBaoController@getSua');
		Route::post('sua/{id}','ThongBaoController@postSua');

		Route::get('them','ThongBaoController@getThem');
		Route::post('them','ThongBaoController@postThem');
		Route::get('xoa/{id}','ThongBaoController@getXoa');

	});
	Route::group(['prefix'=>'user'],function(){
		//admin/tintuc/danhsach
		Route::get('danhsach','UserController@getDanhsach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');

	});

});
Route::get('trangchu','PagesController@trangchu');
Route::get('lienhe','PagesController@lienhe');
Route::get('gioithieu','PagesController@gioithieu');
Route::get('loaitin/{id}','PagesController@loaitin')->name('loaitin');
Route::get('tintuc/{id}','PagesController@tintuc');
Route::get('slidetin/{id}','PagesController@slidetin');
Route::get('thongbaotin/{id}','PagesController@thongbaotin');
Route::post('timkiem', 'PagesController@timkiem');
Route::get('setCookie','PagesController@setCookie');
Route::get('getCookie','PagesController@getCookie')->name('getthu');


