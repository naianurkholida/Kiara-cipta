<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;

class Helper
{
	public static function title()
	{
		$data = 'DERMA EXPRESS';

		return $data;
	}

	public static function logo()
	{
		$data = '/assets/images/dermaexpress.png';

		return $data;
	}

    public static function baseLabelPage()
    {
		$url = request()->url();
        $route = app('router')->getRoutes()->match(app('request')->create($url));
		$dataRoute = $route->action['as'];

		$data = Menu::where('url', $dataRoute)->first();

        if ($data) {
            $label = $data->label;

            session::put('label_page', $label);
        }
		
		return session::get('label_page');
    }

    public static function menus()
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
							->where('menus.parent_id', '!=', '0')
							->where('menus.deleted_at', null)
							->orderBy('order_num','ASC')
							->get();

		return $data;
    }
    
    public static function labelPage($url)
	{
		
	}
}