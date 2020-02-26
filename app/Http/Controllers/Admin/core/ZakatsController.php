<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Menu;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\User;
use App\Entities\Admin\modul\Zakat;
use App\Entities\Admin\modul\ZakatDetail;

class ZakatsController extends Controller
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
    	$zakat   = Zakat::select('*')->join('zakat_detail', 'zakat_detail.zakat_id', '=', 'zakat.id')
    				->join('users', 'users.id', '=', 'zakat.user_id')->where('zakat.deleted_at', null)
    				->groupby('zakat.user_id')->get();

    	return view('admin.core.zakat.index', compact('top_bar','zakat'));
    }
}
