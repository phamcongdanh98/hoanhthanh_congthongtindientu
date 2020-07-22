<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;

class LoaiTinController extends Controller
{
    public function getDanhSach()
    {
    	$loaitin=LoaiTin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem()
    {
    	
    	return view('admin.loaitin.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    	[
    		'TenLoai'=> 'required|min:3|max:100'

    	],
    	[
    		'TenLoai.required'=>'Bạn chưa nhập tên loại tin',

    		'TenLoai.min'=>'Tên thể loại phải có đọ dài tự 3 đến 100 ký tự',
    		'TenLoai.max'=>'Tên thể loại phải có đọ dài tự 3 đến 100 ký tự',
    	]);
    	$loaitin= new LoaiTin;
    	$loaitin->TenLoai=$request->TenLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/them')->with('thongbao','Them thanh cong');

    }
    public function getSua($id)
    {
    	$loaitin=LoaiTin::find($id);
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin]);

    }
    public function postSua(Request $request,$id)
    {
    	$loaitin=LoaiTin::find($id);
    	$this->validate($request,
    		[
    			'TenLoai' =>'required|min:1|max:100'

    		],

    		[
    			'TenLoai.required'=>'Bạn phải nhập tên loại tin',
    			'TenLoai.min'=>'Tên loại tin phải có đọ dài tự 3 đến 100 ký tự',
    			'TenLoai.max'=>'Tên loại tin phải có đọ dài tự 3 đến 100 ký tự',


    		]
    	);
    	$loaitin->TenLoai=$request->TenLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sua thanh cong');

    }

    public function getXoa($id)
    {
        $tintuc = tintuc::where('IdLoaiTin',$id)->delete();
    	$loaitin=LoaiTin::find($id);
    	$loaitin->delete();
    	return redirect('admin/loaitin/danhsach')->with('thongbao','Sua thanh cong');

    }

}
