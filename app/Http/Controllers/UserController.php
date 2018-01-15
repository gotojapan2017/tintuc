<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhsach(){
        $user = User::all();
        
        return view('admin.user.danhsach',['user'=>$user]);
    }
    
    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:32',
            'passwordAgain' => 'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập Tên',
            'name.min'=>'Tên ít nhất 3 kí tự',
            'email.required'=>'Bạn chưa nhập Email',
            'email.email' => 'Tên email sai định dạng',
            'email.unique'=>'Email đã tồn tại, Xin hãy nhập email khác',
            'password.required'=>'Bạn chưa nhập Mật khẩu',            
            'password.min' => 'Mật khẩu có 6 đến 32 kí tự',
            'password.max' => 'Mật khẩu có 6 đến 32 kí tự',
            'passwordAgain.required'=>'Bạn chưa nhập lại Mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password=bcrypt($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Đã thêm thành công');
    }
    
    public function getSua($id){
        $user = User::find($id);
        
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|min:3'
        ],[
            'name.required'=>'Bạn chưa nhập Tên',
            'name.min'=>'Tên ít nhất 3 kí tự'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->level = $request->level;
        // Kiem tra mat khau co thay doi hay khong
        if ($request->changePassword == "on")
        {
            $this->validate($request,[
                'password'=>'required|min:6|max:32',
                'passwordAgain' => 'required|same:password'
            ],[
                'password.required'=>'Bạn chưa nhập Mật khẩu',
                'password.min' => 'Mật khẩu có 6 đến 32 kí tự',
                'password.max' => 'Mật khẩu có 6 đến 32 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại Mật khẩu',
                'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Đã sửa thành công');
    }
    
    public function getXoa($id){
        $user = User::find($id);
        $user->delete();
        
        return redirect('admin/user/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
    
    // Dang nhap admin
    public function getDangnhapAdmin(){
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'password phải ít nhất 6 kí tự',
            'password.mix'=>'password tối đa 32 kí tự'
        ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('admin/theloai/danhsach');
        }
        else {
            return redirect('admin/dangnhap')->with('thongbao','Bạn đã nhập sai email hoặc password');
        }
    }

    public function getDangxuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
