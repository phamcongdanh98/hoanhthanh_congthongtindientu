<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\Slide;
use App\TinTuc;
use App\ThongBao;
use Illuminate\Http\Response;

class PagesController extends Controller
{
	function __construct()
	{
		$loaitin = LoaiTin::all();
        $slide =Slide::all();
        $thongbao=ThongBao::orderBy('id','DESC')->get();
		view()->share('loaitin',$loaitin);
        view()->share('slide',$slide);
        view()->share('thongbao',$thongbao);
	}
    function trangchu()
    {
    	return view('pages.trangchu');
    }
    function lienhe()
    {
    	return view('pages.lienhe');
    }
    function gioithieu()
    {
        return view('pages.gioithieu');
    }

    function tintuc($id)
    {
        $tintuc=TinTuc::find($id);
        $tinlienquan=TinTuc::where('IdLoaiTin',$tintuc->IdLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan]);
    }
    function loaitin($id)
    {
        $loaitin1=LoaiTin::find($id);
        $tintuc=TinTuc::orderBy('id','DESC')->where('IdLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin1'=>$loaitin1,'tintuc'=>$tintuc]);

    }
    function slidetin($id)
    {
        $slidetin=Slide::find($id);
        // $slidetinlienquan=TinTuc::where('IdLoaiTin',$tintuc->IdLoaiTin)->take(4)->get();

        return view('pages.slidetin',['slidetin'=>$slidetin]);
    }
    function thongbaotin($id)
    {
        $thongbaotin=ThongBao::find($id);
        return view('pages.thongbaotin',['thongbaotin'=>$thongbaotin]);
    }
    function timkiem(Request $request)
    {
        $tukhoa =$request->tukhoa;
        $tintuc=TinTuc::where('TieuDe','like',"%$tukhoa%")->take(10)->paginate(5);
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);

    }
    public function setCookie(Request $request){
        $response=new Response();
        $response->withCookie('danh','Khung',1);
        $response->save();
        echo "coki cua toi la";
        $request->cookie('danh');
    }
    public function getCookie(Request $request)
    {
        echo "coki cua toi la";
        return $request->cookie('danh');
    }
}


