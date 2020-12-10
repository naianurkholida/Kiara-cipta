<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\BestSellerIcon;
use App\Entities\Admin\core\Produk;
use Carbon\Carbon;
use DB;
use Image;
use File;

class BestSellerController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/icons';
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
    	
    	$validasi = MenuAccess::select('*')
    	->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
    	->where('role_id', \Session::get('role_id'))
    	->where('menus.deleted_at', null)
    	->where('menus.id', 8)
    	->first();

    	$best_seller_icon = BestSellerIcon::with('produk.getProdukLanguage')->get();

    	return view('admin.core.produk.best_seller.index', compact('top_bar', 'validasi', 'best_seller_icon'));
    }

    public function insert(Request $request)
    {
    	$top_bar = $this->top_bar();

    	$produk = Produk::with('getProdukLanguage')->where('id_category', 57)->get();

    	return view('admin.core.produk.best_seller.insert', compact('top_bar', 'produk'));
    }

    public function store(Request $request)
    {
    	if($request->file('icon') != null){
    		$data = new BestSellerIcon;
    		$data->product_id = $request->best_seller;
            $file = $request->file('icon');

            if (!File::isDirectory($this->path)) {
                File::makeDirectory($this->path);
            }

            $fileName = 'Icon'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->save($this->path.'/'. $fileName);
            $data->icon = $fileName;
            $data->save();
        }

        return redirect('produk/best_seller')->with('success', 'Icon Berhasil di Tambahkan');
    }

    public function edit(Request $request, $id)
    {
    	$top_bar = $this->top_bar();
    	$best_seller = BestSellerIcon::findOrFail($id);

    	$produk = Produk::with('getProdukLanguage')->where('id_category', 57)->get();

    	return view('admin.core.produk.best_seller.edit', compact('id', 'top_bar', 'best_seller', 'produk'));
    }

    public function update(Request $request, $id)
    {
    	$data = BestSellerIcon::findOrFail($id);
    	$data->product_id = $request->best_seller;
    	if($request->file('icon') != null){
    		$file = $request->file('icon');

            if (!File::isDirectory($this->path)) {
                File::makeDirectory($this->path);
            }

            $fileName = 'Icon'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->save($this->path.'/'. $fileName);
            $data->icon = $fileName;
    	}
    	$data->save();

    	return redirect('produk/best_seller')->with('success', 'Icon Berhasil di Update');
    }

    public function delete($id)
    {
    	$data = BestSellerIcon::findOrFail($id);
    	File::delete('admin/assets/media/icons/'.$data->icon);

    	BestSellerIcon::where('id', $id)->delete();

    	return redirect()->back()->with('success', 'Icon Berhasil di Hapus');
    }
}
