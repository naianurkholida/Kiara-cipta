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
}
