<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slide=Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem(Request $request)
    {
        return view('admin.slide.them');
        
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,[
            'Ten'=>'required',
            'NoiDung'=>'required',

        ],[
            'Ten.required'=>'Ban chua nhap ten',
            'NoiDung.required'=>'Ban chua nhap Noi dung',
        ]);


        $slide=new Slide;
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        if($request->has('link'))
            $slide->link=$request->link;

        if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif' )
            {
                return redirect('admin/slide/them')->with('thongbao','Ban chon sai file');

            }

            $name=$file->getClientOriginalName();

            $Hinh= str_random(4)."_". $name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh= str_random(4)."_". $name;
            }

            $file->move("slide",$Hinh);
            $slide->Hinh=$Hinh;

        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','them thanh cong');

    }
    public function getSua($id)
    {
        $slide= Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);

       
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'Ten'=>'required',
            'NoiDung'=>'required',

        ],[
            'Ten.required'=>'Bạn chưa nhập tiêu đề',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);


        $slide=Slide::find($id);
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        if($request->has('link'))
            $slide->link=$request->link;

        if($request->hasFile('Hinh'))
        {

            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jfif')
            {
                return redirect('admin/slide/them')->with('loi','Ban chon sai file');

            }

            $name=$file->getClientOriginalName();

            $Hinh= str_random(4)."_". $name;
            while (file_exists("upload/slide/".$Hinh)) {
                $Hinh= str_random(4)."_". $name;
            }

            // unlink("upload/slide/".$slide->Hinh);
            $file->move("slide",$Hinh);
            $slide->Hinh=$Hinh;

        }

        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
       

    }

    public function getXoa($id)
    {
    	$slide=Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Sửa thành công');
    }

}
