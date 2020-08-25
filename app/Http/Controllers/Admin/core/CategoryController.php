<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Parameter;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use Image;
use File;

class CategoryController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'admin/assets/media/icon-kategori';
        //Definisi Dimensi Foto
		$this->dimensions = ['245', '300', '500'];
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$top_bar = $this->top_bar();
    	if(Session::get('role_id') == '1'){
    		$categories = Category::where('id_parent', '0')->get();
    	}else{
    		$categories = Category::where('id_parent', '0')
    		->where('is_created', 1)
    		->get();
    	}
    	$validasi = MenuAccess::select('*')
    	->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
    	->where('role_id', \Session::get('role_id'))
    	->where('menus.deleted_at', null)
    	->where('menus.id', 8)
    	->first();

    	return view('admin.core.category.index', compact('top_bar', 'categories', 'validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$top_bar = $this->top_bar();
    	$categories = Category::where('id_parent', 0)->get();
    	return view('admin.core.category.insert', compact('top_bar', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$category = new Category;
    	$category->id_parent = $request->tipe;
    	$category->id_language = 1;
    	$category->category = $request->kategori;
    	$category->order_num = $request->order_num;
    	$category->is_created = Session::get('id');
    	$category->save();

    	$menu = new MenuFrontPage;
    	$menu->id_category = 8;
    	$menu->id_sub_menu = 3;
    	$menu->jenis = 'Page';
    	$menu->sort_order = 1;
    	$menu->url = strtolower($request->kategori);
    	$menu->is_created = \Session::get('id');
    	$menu->save();

    	for($i = 0; $i < 2; $i++){
    		$menulang = new MenuFrontPageLanguage;
    		$menulang->id_menu_front_page = $menu->id;
    		$menulang->id_language = 1;
    		$menulang->judul_menu = $request->kategori;
    		$menulang->save();
    	}

    	return redirect('category')->with('success', 'Data Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$top_bar = $this->top_bar();
    	$head_category = Category::find($id);
    	$detail_category = Category::where('id_parent', $id)->get();
    	return view('admin.core.category.detail', compact('top_bar', 'head_category', 'detail_category'));
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
    	$category = Category::find($id);
    	// $id_cek  = Parameter::where('key', 'kategori_program')->first();
    	// $cek_kat = Category::where('id_parent', $id_cek->value)->where('id', $category->id)->first();
    	$cek_kat = '';
    	return view('admin.core.category.edit', compact('top_bar', 'category', 'cek_kat'));
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
    	$category = Category::find($id);
    	if($request->file('gambar') != null){
    		File::delete('admin/assets/media/icon-kategori/'.$category->gambar);
    	}

    	$category->category = $request->kategori;
    	$category->order_num = $request->order_num;
    	$category->is_created = Session::get('id');
    	$category->save();

       // $id_cek  = Parameter::where('key', 'kategori_program')->first();
       // $cek_kat = Category::where('id_parent', $id_cek->value)->where('id', $category->id)->first();

    	$cek_kat = '';

    	if($cek_kat != null && $request->file('gambar') != null){
    		// $gambar = Gambar::where('id_relasi', $category->id)->first();
    		// $gambar->id_relasi = $category->id;
    		// $gambar->deskripsi = $request->deskripsi;
    		// #upload foto to database
    		// $file = $request->file('gambar');

	    	// #JIKA FOLDERNYA BELUM ADA
    		// if (!File::isDirectory($this->path)) {
	    	// 	#MAKA FOLDER TERSEBUT AKAN DIBUAT
    		// 	File::makeDirectory($this->path);
    		// }

	    	// #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
    		// $fileName = 'Icon'.'_'.uniqid().'.'.$file->getClientOriginalExtension();

	    	// #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
    		// Image::make($file)->save($this->path.'/'. $fileName);

	    	// #SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
    		// $gambar->gambar = $fileName;
    		// $gambar->save();
    	}

    	return redirect('category')->with('info', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	// $category = Gambar::where('id_relasi', $id)->first();
    	// if($category != null){
    	// 	File::delete('admin/assets/media/icon-kategori/'.$category->gambar);
    	// }

    	// Gambar::where('id_relasi', $id)->delete();
    	$dataCat = Category::where('id', $id);

    	$language = MenuFrontPageLanguage::where('judul_menu', $dataCat->category);
    	$languageFirst = MenuFrontPage::where('id', $language[0]->id_menu_front_page)->delete();

    	$dataCat->delete();
    	$language->delete();

    	return redirect('category')->with('danger', 'Data Berhasil di Hapus');
    }
}
