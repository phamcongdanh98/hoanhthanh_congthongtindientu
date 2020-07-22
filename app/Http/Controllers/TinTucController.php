<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
    	$tintuc=TinTuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem()
    {
        $loaitin=LoaiTin::all();
    	return view('admin.tintuc.them',['loaitin'=>$loaitin]);
    	
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|max:200',
            'TomTat'=>'max:1000',
            'NoiDung'=>'required'

        ],[
            'LoaiTin.required'=>'Bạn chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.max'=>'Tiêu đề quá 200 ký tự',
            'TomTat.max'=>'Tóm tắt quá 1000 ký tự',
            'NoiDung.required'=>'Ban chua nhap noi dung'
        ]);
        $tintuc=new TinTuc;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;

        if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect('admin/tintuc/them')->with('loi','Ban chon sai file');

            }

            $name=$file->getClientOriginalName();

            $Hinh= str_random(4)."_". $name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh= str_random(4)."_". $name;
            }
            $file->move("tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;

        }
        else
        {
            $tintuc->Hinh="";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Them tin thanh cong');

    }
    public function getSua($id)
    {
        $loaitin=LoaiTin::all();
        $tintuc=TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }
    public function postSua(Request $request,$id)
    {
        $tintuc=TinTuc::find($id);
    	
        $this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required',
            'NoiDung'=>'required',

        ],[
            'LoaiTin.required'=>'Ban chua chon loai tin',
            'TieuDe.required'=>'Ban chua nhap tieu de',
            'NoiDung.required'=>'Ban chua nhap noi dung',
        ]);
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;

        if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect('admin/tintuc/them')->with('loi','Ban chon sai file');

            }

            $name=$file->getClientOriginalName();

            $Hinh= str_random(4)."_". $name;
            while (file_exists("upload/tintuc/".$Hinh)) {
                $Hinh= str_random(4)."_". $name;
            }

            // unlink("tintuc".$tintuc->Hinh);
            $file->move("tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;

        }
        else
        {
            $tintuc->Hinh="";
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sua Thanh Cong');

    }

    public function getXoa($id)
    {
    	$tintuc=TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xoa thanh cong');

    }

}
