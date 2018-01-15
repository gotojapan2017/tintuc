<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
    //
    public function getDanhsach(){
        $tintuc = TinTuc::orderBy('id','decs')->get();
        return view('admin/tintuc/danhsach',['tintuc'=>$tintuc]);
    }
    
    public function getThem(){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe' => 'required|unique:TinTuc,TieuDe|min:3',
            'TomTat' => 'required|min:5',
            'NoiDung' => 'required|min:10'
        ],[
            'LoaiTin.required'=>'Bạn phải chọn Loại tin',
            'TieuDe.required' => 'Bạn chưa nhập Tiêu đề',
            'TieuDe.unique' => 'Tiêu đề đã tồn tại, Xin hãy nhập tiêu đề khác',
            'TieuDe.min' => 'Tiêu đề ít nhất 3 kí tự',
            'TomTat.required' => 'Bạn chưa nhập Tóm tắt',
            'TomTat.min' => 'Tóm tắt ít nhất 5 kí tự',
            'NoiDung.required' => 'Bạn chưa nhập Nội dung',
            'NoiDung.min' => 'Nội dung ít nhất 10 kí tự'
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->SoLuotXem = 0;

        if ($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có định dạnh jpg,phg,pp');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(5)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else
        {
            $tintuc->Hinh = "";
        }
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Bạn đã Thêm thành công');
    }
    
    public function getSua($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin/tintuc/sua',['tintuc'=>$tintuc, 'theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,[
            'LoaiTin' => 'required',
            'TieuDe' => 'required|unique:TinTuc,TieuDe|min:3',
            'TomTat' => 'required|min:5',
            'NoiDung' => 'required|min:10'
        ],[
            'LoaiTin.required' => 'Bạn chưa chọn Loại Tin',
            'TieuDe.required' => 'Bạn chưa nhập Tiêu đề',
            'TieuDe.unique' => 'Tiêu đề đã tồn tại, xin hãy nhập tiêu đề khác',
            'TieuDe.min' => 'Tiêu đề ít nhất 3 kí tự',
            'TomTat.required' => 'Bạn chưa nhập Tóm tắt',
            'TomTat.min' => 'Tóm tắt ít nhất 5 kí tự',
            'NoiDung.required' => 'Bạn chưa nhập Nội dung',
            'NoiDung.min' => 'Nội dung có ít nhất 10 kí tự'
        ]);
        $tintuc = TinTuc::find($id);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->idLoaiTin = $request->LoaiTin;
        if ($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có định dạnh jpg,phg,pp');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(5)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(5)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }
        $tintuc->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    
    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        
        return redirect('admin/tintuc/danhsach')->with('thongbao','Đã xóa thành công');
    }
}
