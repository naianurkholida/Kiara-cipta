<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Role as Role;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;

class RoleController extends Controller
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
		if(Session::get('role_id') == '1'){
			$role = Role::select('*')->where('deleted_at','=', NULL)->get();
		}else{
			$role = Role::select('*')->where('deleted_at','=', NULL)->where('created_by', Session::get('id'))->get();
		}
		$validasi = MenuAccess::select('*')
        ->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
        ->where('role_id', \Session::get('role_id'))
        ->where('menus.deleted_at', null)
        ->where('menus.id', 5)
        ->first();
		return view('admin.core.role.index', compact('role','top_bar','validasi'));	
	}

	public function insert()
	{
		$top_bar = $this->top_bar();
		return view('admin.core.role.insert',compact('top_bar'));
	}

	public function store(Request $request)
	{
		$role = new Role;
		$role->code        = $request->code;
		$role->name        = $request->nama;
		$role->description = $request->description;
		$role->icon 	   = '-';
		$role->created_by  = $request->created_by;
		$role->save();
		return redirect('/role')->with('success', 'Data Berhasil di Simpan');
	}

	public function edit($id)
	{
		$top_bar = $this->top_bar();
		$role = Role::find($id);
		return view('admin.core.role.edit', compact('role','top_bar'));
	}

	public function update(Request $request, $id)
	{
		$role = Role::find($id);
		$role->code        = $request->code;
		$role->name        = $request->nama;
		$role->description = $request->description;
		$role->icon 	   = '-';
		$role->created_by  = $request->created_by;
		$role->save();

		return redirect('/role')->with('info', 'Data Berhasil di Update');
	}

	public function delete($id)
	{
		$role = Role::find($id);
		$role->deleted_at = date('Y-m-d H:i:s');
		$role->save();
		return redirect('/role')->with('danger', 'Data Berhasil di Hapus');
	}
}
