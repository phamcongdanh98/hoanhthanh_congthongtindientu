<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\ThongBao;

class ThongBaoController extends Controller
{
    public function getDanhSach()
    {
        $thongbao=ThongBao::all();
        return view('admin.thongbao.danhsach',['thongbao'=>$thongbao]);
    }
    public function getThem(Request $request)
    {
        return view('admin.thongbao.them');
        
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,[
            'TieuDe'=>'required',
            'NoiDung'=>'required',

        ],[
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'NoiDung.required'=>'Ban chưa nhập nội dung',
        ]);


        $thongbao=new ThongBao;
        $thongbao->TieuDe=$request->TieuDe;
        $thongbao->NoiDung=$request->NoiDung;
        $thongbao->save();
        return redirect('admin/thongbao/them')->with('thongbao','them thanh cong');

    }
    public function getSua($id)
    {
        $thongbao= ThongBao::find($id);
        return view('admin.thongbao.sua',['thongbao'=>$thongbao]);

       
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'TieuDe'=>'required',
            'NoiDung'=>'required'

        ],[
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'NoiDung.required'=>'Bạn chưa nhập nọi dung'
        ]);

        $thongbao=ThongBao::find($id);
        $thongbao->TieuDe=$request->TieuDe;
        $thongbao->NoiDung=$request->NoiDung;
        $thongbao->save();
        return redirect('admin/thongbao/sua/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getXoa($id)
    {
    	$thongbao=ThongBao::find($id);
        $thongbao->delete();

        return redirect('admin/thongbao/danhsach')->with('thongbao','Xóa thành công');
    }

}
