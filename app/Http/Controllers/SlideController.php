<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhsach(){
        $slide = Slide::all();
        
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    
    public function getThem(){
        return view('admin.slide.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'Ten'=>'required|unique:slide,Ten|min:3',
            'NoiDung'=>'required|min:10'
        ],[
            'Ten.required' => 'Bạn chưa nhập Tên Slide',
            'Ten.unique' => 'Tên Slide đã tồn tại',
            'Ten.min' => 'Tên có ít nhất 3 kí tự',
            'NoiDung.required' => 'Bạn chưa nhập Nội dung',
            'NoiDung.min' => 'Nội dung có ít nhất 10 kí tự'
        ]);
        $slide = new Slide;
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;

        // link
        if ($request->has('link')){
            $slide->link = $request->link;
        }
        else
        {
            $slide->link = "";
        }

        //Hinh
        if ($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                return redirect('admin/slide/them')->with('loi','Định dạng Hình bị sai, Xin hãy chọn Hình khác');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(5)."_".$name;
            while (file_exists("upload/slide/".$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            $file->move("upload/slide",$Hinh);
            $slide->Hinh = $Hinh;
        }
        else
        {
            $slide->Hinh = "";
        }
        $slide->save();
        
        return redirect('admin/slide/them')->with('thongbao','Bạn đã thêm Slide thành công');
    }
    
    public function getSua($id){
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $request, $id){
        $slide = Slide::find($id);
        $this->validate($request,[
            'Ten'=>'required|unique:slide,Ten|min:3',
            'NoiDung'=>'required|min:10'
        ],[
            'Ten.required' => 'Bạn chưa nhập Tên Slide',
            'Ten.unique' => 'Tên Slide đã tồn tại',
            'Ten.min' => 'Tên có ít nhất 3 kí tự',
            'NoiDung.required' => 'Bạn chưa nhập Nội dung',
            'NoiDung.min' => 'Nội dung có ít nhất 10 kí tự'
        ]);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if ($request->has('link')){
            $slide->link = $request->link;
        }
        //Hinh
        if ($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                return redirect('admin/slide/them')->with('loi','Định dạng Hình bị sai, Xin hãy chọn Hình khác');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(5)."_".$name;
            while (file_exists("upload/slide/".$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            unlink("upload/slide/".$request->Hinh);
            $file->move("upload/slide",$Hinh);
            $slide->Hinh = $Hinh;
        }

        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Đã sửa thành công');
    }

    public function getXoa($id){
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao', 'Đã xóa thành công');
    }
}
