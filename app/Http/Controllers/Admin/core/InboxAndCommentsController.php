<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Entities\FrontPage\Inbox;
use App\Entities\FrontPage\Comments;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Http\Controllers\Controller;
use App\Mail\Email\InboxEmail;
use Illuminate\Support\Facades\Mail;

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
        $inbox = Inbox::orderBy('created_at', 'desc')->get();
        return view('admin.core.inbox_and_comments.index', compact('top_bar', 'inbox'));
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
        $inbox->nama = $request->name;
        $inbox->email = $request->email;
        $inbox->inbox = $request->inbox;
        $inbox->save();

        try{
            Mail::send('email', ['nama' => $request->name, 'pesan' => $request->inbox], function ($message) use ($request)
            {
                $message->subject('Customer Help');
                $message->from($request->email, $request->name);
                $message->to('media@derma-express.com');
            });
            return redirect()->back()->with('alert-success','Terima kasih telah menghubungi kami. Salah satu staff kami akan membalas pesan Anda secepatnya');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function post_comment(Request $request){
        
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
