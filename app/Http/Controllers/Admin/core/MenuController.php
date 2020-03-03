<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;

class MenuController extends Controller
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

	public function index()
	{   
		$top_bar = $this->top_bar();
		if(\Session::get('role_id') == '1'){
			$menu = Menu::select('*')->where('deleted_at', '=', null)->get();
		}else{
			$menu = Menu::select('*')->where('deleted_at', '=', null)->where('created_by', \Session::get('id'))->get();
		}
		$validasi = MenuAccess::select('*')
		->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
		->where('role_id', \Session::get('role_id'))
		->where('menus.deleted_at', null)
		->where('menus.id', 3)
		->first();
		return view('admin.core.menu.index', compact('menu','top_bar','validasi'));
	}

	public function insert()
	{
		$top_bar = $this->top_bar();
		$menu    = Menu::where('deleted_at', null)->where('parent_id', 0)->get();
		return view('admin.core.menu.insert', compact('top_bar','menu'));
	}

	public function store(Request $request)
	{
		$menu = new Menu;
		$menu->parent_id  = $request->parent_id;
		$menu->label      = $request->label;
		$menu->icon       = $request->icon;
		$menu->url        = $request->url;
		$menu->order_num  = $request->order_num;
		$menu->status     = $request->status;
		$menu->created_by = $request->created_by;
		$menu->save();

		return redirect('/menu')->with('success', 'Data Berhasil di Simpan');
	}

	public function edit($id)
	{
		$top_bar   = $this->top_bar();
		$menu      = Menu::find($id);
		$menus    = Menu::where('deleted_at', null)->where('parent_id', 0)->get();
		return view('admin.core.menu.edit', compact('menu','top_bar','menus'));
	}

	public function update(Request $request, $id)
	{
		$menu = Menu::find($id);
		$menu->parent_id  = $request->parent_id;
		$menu->label      = $request->label;
		$menu->icon       = $request->icon;
		$menu->url        = $request->url;
		$menu->order_num  = $request->order_num;
		$menu->status     = $request->status;
		$menu->created_by = $request->created_by;
		$menu->save();

		return redirect('/menu')->with('info', 'Data Berhasil di Update');
	}

	public function delete($id)
	{
		$menu = Menu::find($id);
		$menu->deleted_at = date('Y-m-d H:i:s');
		$menu->save();
		return redirect('/menu')->with('danger', 'Data Berhasil di Hapus');
	}
}
