<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LoaiTin;
use App\User;
use DB;
use Cache;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $user=User::all();
        return view ('admin.user.danhsach',['user'=>$user]);

    }
    public function getThem()
    {
        return view('admin.user.them');
	
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Ban chua nhap ten ',
            'name.min'=>'Ban nhap it hon 3 ky tu ',

            'email.required'=>'Ban chua nhap email ',
            'email.same'=>'Ban chua nhap dung dinh dang email ',
            'email.unique'=>'Email da ton tai ',


            'password.required'=>'Ban chua nhap password ',
            'password.min'=>'Ban nhap it hon 3 ky tu ',
            'password.max'=>'Ban qua 32 ky tu ',

            'passwordAgain.required'=>'ban chua nhap lai passsword ',
            'passwordAgain.same'=>'ban nhap khong khop password '

        ]);

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->quyen=$request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','them thanh cong');


    }
    public function getSua($id)
    {
       $user= User::find($id);
       return view('admin.user.sua',['user'=>$user]);

    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required|min:3',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],
        [
            'name.required'=>'Ban chua nhap ten ',
            'name.min'=>'Ban nhap it hon 3 ky tu ',

            'password.required'=>'Ban chua nhap password ',
            'password.min'=>'Ban nhap it hon 3 ky tu ',
            'password.max'=>'Ban qua 32 ky tu ',

            'passwordAgain.required'=>'ban chua nhap lai passsword ',
            'passwordAgain.same'=>'ban nhap khong khop password '


        ]);
        $user= User::find($id);
        $user->name=$request->name;
        $user->quyen=$request->quyen;
        $user->password=bcrypt($request->password);
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','sua thanh cong');
        
    }

    public function getXoa($id)
    {
    	$user= User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xoa thanh cong');

    }
    public function getdangnhapAdmin()
    {
        return view('admin.login');

    }
    public function postdangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'


        ],[
            'email.required'=>'Ban chua nhap email ',
            'password.required'=>'Ban chua nhap password ',
            'password.min'=>'Ban nhap it hon 3 ky tu ',
            'password.max'=>'Ban qua 32 ky tu '

        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/loaitin/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','bạn nhập sai rồi');
        }


    }
    public function getdangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');

    }

    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
            else
                echo "User " . $user->name . " is offline.";
        }
    }

}
