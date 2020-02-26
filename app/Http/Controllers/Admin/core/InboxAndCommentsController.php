<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Entities\FrontPage\Inbox;
use App\Entities\FrontPage\Comments;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Http\Controllers\Controller;

class InboxAndCommentsController extends Controller
{
    public function top_bar()
    {
        $data['menu_item'] = MenuAccess::select('*')
                            ->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
                            ->where('role_id', \Session::get('role_id'))
                            ->where('menus.parent_id', '0')
                            ->where('menus.deleted_at', null)
                            ->orderBy('order_num','ASC')
                            ->get();

        $data['setting']   = MenuAccess::select('*')
                            ->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
                            ->where('role_id', \Session::get('role_id'))
                            ->where('menus.parent_id', '!=', 0)
                            ->where('menus.deleted_at', null)
                            ->orderBy('order_num','ASC')
                            ->get();

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_bar = $this->top_bar();
        $comments = Comments::select('comments.*', 'posting.id as id_pos', 'posting_language.judul')->join('posting', 'posting.id', '=', 'comments.id_posting')->join('posting_language', 'posting_language.id_posting', '=', 'posting.id')->where('posting_language.id_language', 1)->get();
        $inbox = Inbox::all();
        // dd($inbox);
        return view('admin.core.inbox_and_comments.index', compact('top_bar', 'inbox', 'comments'));
    }

    public function actived($id){
        $comment = Comments::find($id);
        if($comment->status == 0){
            $comment->status = 1;
        }else{
            $comment->status = 0;
        }
        $comment->save();

        return redirect('inbox');
    }

    public function post_inbox(Request $request){
        
        $inbox = new Inbox;
        $inbox->nama = $request->nama;
        $inbox->email = $request->email;
        $inbox->inbox = $request->inbox;
        $inbox->save();

        return redirect()->back();
    }

    public function post_comment(Request $request){
        // dd($request->all());
        
        $comment = new Comments;
        $comment->nama = $request->nama;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->status = 1;
        $comment->id_posting = $request->id_posting;
        $comment->save();

        return redirect()->back();
    }
}
