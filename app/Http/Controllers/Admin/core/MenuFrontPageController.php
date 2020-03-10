<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;

class MenuFrontPageController extends Controller
{
    public function url(){
        $url = "";
    }

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

    function active(Request $request){
        $id = $request->id;

        $active = MenuFrontPage::find($id);
        $active->is_active = 0;
        $active->save();

        return response()->json($active);
    }

    function nonactive(Request $request){
        $id = $request->id;

        $active = MenuFrontPage::find($id);
        $active->is_active = 1;
        $active->save();

        return response()->json($active);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_bar = $this->top_bar();

        $menu_front_page = DB::table('menu_front_page')->select('*', 'menu_front_page.id as key_id')
        ->join('category', 'category.id', '=', 'menu_front_page.id_category')
        ->join('menu_front_page_language', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')
        ->where('menu_front_page_language.id_language', 1)
        ->where('menu_front_page.id_sub_menu', 0)
        ->orderby('category.category', 'desc')
        ->orderby('menu_front_page.sort_order', 'asc')
        ->get();

        $validasi = MenuAccess::select('*')
        ->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
        ->where('role_id', \Session::get('role_id'))
        ->where('menus.deleted_at', null)
        ->where('menus.id', 11)
        ->first();

        return view('admin.core.menu_front_page.index', compact('top_bar', 'menu_front_page','validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $top_bar = $this->top_bar();
        $category = Category::where('category', "Menu Header")->orwhere('category', "Menu Footer")->get();
        $language = Language::all();
        $menu_front_page_language = MenufrontPageLanguage::join('menu_front_page', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')->where('menu_front_page.id_sub_menu', 0)->where('menu_front_page_language.id_language', 1)->get();
        return view('admin.core.menu_front_page.insert', compact('top_bar', 'category', 'language', 'menu_front_page_language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new MenuFrontPage;
        $menu->id_category = $request->kategori;
        $menu->id_sub_menu = $request->parent;
        $menu->jenis = $request->jenis;
        $menu->sort_order = $request->sort_order;
        $menu->url = strtolower(str_replace(' ','-',$request->judul[0]));
        $menu->is_created = \Session::get('id');
        $menu->save();

        if($request->trigger == 1){
            foreach($request->judul as $key => $value){
                $menulang = new MenuFrontPageLanguage;
                $menulang->id_menu_front_page = $menu->id;
                $menulang->id_language = $request->language[$key];
                $menulang->judul_menu = $request->judul[0];
                $menulang->save();
            }
        }else{
            foreach($request->judul as $key => $value){
                if($request->judul[$key] != null){
                    $menulang = new MenuFrontPageLanguage;
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[$key];
                    $menulang->save();
                }
            }
        }

        return redirect('menu_front_page')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = \Request::url();

        $top_bar = $this->top_bar();
        $category = Category::where('category', "Menu Header")->orwhere('category', "Menu Footer")->get();
        $language = Language::all();
        $menu_front_page_language = MenufrontPageLanguage::where('id_language', 1)->where('id_menu_front_page', '!=', $id)->get();
        $menu_front_page = MenuFrontPage::find($id);
        $menu_front_page_lang = MenuFrontPageLanguage::where('id_menu_front_page', $id)->get();
        $child_menu = MenuFrontPage::join('menu_front_page_language', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')->where('menu_front_page.id_sub_menu', $id)->get();
        // dd($child_menu);
        return view('admin.core.menu_front_page.detail', compact('top_bar', 'category', 'language', 'menu_front_page_language', 'menu_front_page', 'menu_front_page_lang', 'child_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $top_bar = $this->top_bar();
        $category = Category::where('category', "Menu Header")->orwhere('category', "Menu Footer")->get();
        $language = Language::all();
        $menu_front_page_language = MenufrontPageLanguage::where('id_language', 1)->where('id_menu_front_page', '!=', $id)->get();
        $menu_front_page = MenuFrontPage::find($id);
        $menu_front_page_lang = MenuFrontPageLanguage::where('id_menu_front_page', $id)->get();
        // dd($menu_front_page_lang);
        return view('admin.core.menu_front_page.edit', compact('top_bar', 'category', 'language', 'menu_front_page_language', 'menu_front_page', 'menu_front_page_lang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = MenuFrontPage::find($id);
        $menu->id_category = $request->kategori;
        $menu->id_sub_menu = $request->parent;
        $menu->jenis = $request->jenis;
        $menu->sort_order = $request->sort_order;
        $menu->is_created = \Session::get('id');
        $menu->save();

        if($request->trigger == 1){
            foreach($request->judul as $key => $value){
                $ceker = MenuFrontPageLanguage::where('id_language', $request->language[$key])->where('id_menu_front_page', $id)->count();
                if($ceker == 1){
                    $menulang = MenuFrontPageLanguage::where('id', $request->idml[$key])->first();
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[0];
                    $menulang->save();
                }else{
                    $menulang = new MenuFrontPageLanguage;
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[0];
                    $menulang->save();
                }
            }
        }else{
            foreach($request->judul as $key => $value){
                $ceker = MenuFrontPageLanguage::where('id_language', $request->language[$key])->where('id_menu_front_page', $id)->count();
                if($ceker == 1){
                    $menulang = MenuFrontPageLanguage::where('id', $request->idml[$key])->first();
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[$key];
                    $menulang->save();
                }else{
                    $menulang = new MenuFrontPageLanguage;
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[$key];
                    $menulang->save();
                }
            }
        }

        return redirect('menu_front_page')->with('info', 'Data Berhasil di Update');
    }

    public function update_back(Request $request, $id)
    {
        $menu = MenuFrontPage::find($id);
        $menu->id_category = $request->kategori;
        $menu->id_sub_menu = $request->parent;
        $menu->jenis = $request->jenis;
        $menu->sort_order = $request->sort_order;
        $menu->save();

        if($request->trigger == 1){
            foreach($request->judul as $key => $value){
                $ceker = MenuFrontPageLanguage::where('id_language', $request->language[$key])->where('id_menu_front_page', $id)->count();
                if($ceker == 1){
                    $menulang = MenuFrontPageLanguage::where('id', $request->idml[$key])->first();
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[0];
                    $menulang->save();
                }else{
                    $menulang = new MenuFrontPageLanguage;
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[0];
                    $menulang->save();
                }
            }
        }else{
            foreach($request->judul as $key => $value){
                $ceker = MenuFrontPageLanguage::where('id_language', $request->language[$key])->where('id_menu_front_page', $id)->count();
                if($ceker == 1){
                    $menulang = MenuFrontPageLanguage::where('id', $request->idml[$key])->first();
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[$key];
                    $menulang->save();
                }else{
                    $menulang = new MenuFrontPageLanguage;
                    $menulang->id_menu_front_page = $menu->id;
                    $menulang->id_language = $request->language[$key];
                    $menulang->judul_menu = $request->judul[$key];
                    $menulang->save();
                }
            }
        }

        return redirect('menu_front_page/detail/'. $menu->id_sub_menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MenuFrontPage::where('id', $id)->delete();
        MenuFrontPageLanguage::where('id_menu_front_page', $id)->delete();

        return redirect('menu_front_page')->with('danger', 'Data Berhasil di Hapus');
    }
}
