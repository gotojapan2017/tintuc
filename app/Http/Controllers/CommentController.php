<?php

namespace App\Http\Controllers;

use App\Comment;
use App\TinTuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function getXoa($id, $idTinTuc){
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Bạn đã xóa Comment thành công');
    }
    
    public function postComment($id, Request $request){
        $idTinTuc = $id;
        $tintuc = TinTuc::find($id);
        $comment = new Comment();
        $comment->idTinTuc = $idTinTuc;
        $comment->NoiDung = $request->NoiDung;
        $comment->idUser = Auth::user()->id;
        $comment->save();
        
        return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html")->with('thongbao','Bạn đã Bình luận thành công');
    }
}
