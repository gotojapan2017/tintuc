<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\User;

class PagesController extends Controller
{
    //
    function __construct()
    {
        $theloai = TheLoai::all();
        View::share('theloai', $theloai);
        // Slide
        $slide = Slide::all();
        View::share('slide', $slide);
//        if (Auth::check())
//        {
//            View::share('nguoidung', Auth::user());
//        }
    }


    function TrangChu(){
        return view('pages.trangchu');
    }

    function LienHe(){
        return view('pages.lienhe');
    }

    function LoaiTin($id){
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    
    function tintuc($id){
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }

    // Dang nhap
    function getDangnhap(){
        return view('pages.dangnhap');
    }

    function postDangnhap(Request $request){
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
            return redirect('trangchu');
        }
        else {
            return redirect('dangnhap')->with('thongbao','Bạn đã nhập sai email hoặc password');
        }
    }

    // Dang xuat
    function getDangxuat(){
        Auth::logout();
        return redirect('trangchu');
    }

    //
    function getNguoidung(){
        return view('pages.nguoidung');
    }

    function postNguoidung(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3'
        ],[
            'name.required'=>'Bạn chưa nhập Tên',
            'name.min'=>'Tên ít nhất 3 kí tự'
        ]);
        $user = Auth::user();
        $user->name = $request->name;
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

        return redirect('nguoidung')->with('thongbao','Đã sửa thành công');
    }

    function getDangky(){
        return view('pages.dangky');
    }

    function postDangky(Request $request){
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
        $user->level = 0;
        $user->save();

        return redirect('dangky')->with('thongbao','Chúc mừng Bạn đã Đăng ký thành công');
    }

    function postTimkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")
            ->orWhere('NoiDung','like',"%$tukhoa%")->take(10)->get();

        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa]);
    }
}
