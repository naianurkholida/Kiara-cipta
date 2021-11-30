<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Role as Role;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;

class MenuAccessController extends Controller
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
	
	public function index(){
		$top_bar = $this->top_bar();
		$role = Role::select('*')->where('deleted_at','=', NULL)->get();
		return view('admin.core.menuAkses.index', compact('role','top_bar'));
	}

	public function list_akses($role_id)
	{
		header('Content-Type: application/json');
		$data['menu'] = Menu::select('*')->where('deleted_at', '=', null)->get();
		
		$data['menuakses'] = MenuAccess::select('*')
		->join('menus','menus.id', '=', 'menu_access.menu_id')
		->where('menu_access.role_id', $role_id)
		->get();

		return response()->json($data);
	}

	public function store(Request $request)
	{
		$makses = Menu::select('menus.id as menid', 
			'menus.parent_id', 
			'menus.label', 
			'menus.url',
			'menu_access.id',
			'menu_access.role_id',
			'menu_access.show',
			'menu_access.menu_id',
			'menu_access.create', 
			'menu_access.read',
			'menu_access.update', 
			'menu_access.delete',
			'menu_access.print',
			'menu_access.download',
			'menu_access.view')
		->leftjoin('menu_access', 'menus.id','=','menu_access.menu_id')
		->where('menus.deleted_at', null)
		->get();

		foreach ($makses as $key => $value) {

			$show 		= 'show_'.$value->menid;
			$menu 		= 'menu_id_'.$value->menid;
			$create 	= 'create_'.$value->menid;
			$read 		= 'read_'.$value->menid;
			$update 	= 'update_'.$value->menid;
			$delete 	= 'delete_'.$value->menid;
			$view 		= 'view_'.$value->menid;
			$print 		= 'print_'.$value->menid;
			$download   = 'download_'.$value->menid;

			$akses = MenuAccess::select('*')
			->where('role_id', $request->role)
			->where('menu_id', $request->$menu)
			->first();

			if(!$akses){
				$makses 			= new MenuAccess;
				$makses->role_id 	= $request->role;
				$makses->menu_id 	= $request->$menu;
				$makses->show 		= $request->$show ? 1 : 0;
 				$makses->create 	= $request->$create ? 1 : 0;
				$makses->read 		= $request->$read ? 1 : 0;
				$makses->update 	= $request->$update ? 1 : 0;
				$makses->delete 	= $request->$delete ? 1 : 0;
				$makses->view 		= $request->$view ? 1 : 0; 
				$makses->print 		= $request->$print ? 1 : 0;
				$makses->download 	= $request->$download ? 1 : 0;
				$makses->save();
			}else{
				$makses = MenuAccess::find($akses->id);
				$makses->role_id 	= $request->role;
				$makses->menu_id 	= $request->$menu;
				$makses->show 		= $request->$show ? 1 : 0; 
				$makses->create 	= $request->$create ? 1 : 0;
				$makses->read 		= $request->$read ? 1 : 0;
				$makses->update 	= $request->$update ? 1 : 0;
				$makses->delete 	= $request->$delete ? 1 : 0;
				$makses->view 		= $request->$view ? 1 : 0; 
				$makses->print 		= $request->$print ? 1 : 0;
				$makses->download 	= $request->$download ? 1 : 0;
				$makses->save();
			}
		}
		return redirect('/menuaccess');
	}
}
