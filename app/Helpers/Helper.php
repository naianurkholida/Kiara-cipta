<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Sosmed;
use App\Entities\Admin\core\Slider;
use App\Entities\Admin\core\SlideLanguage;
use App\Entities\Admin\core\Treatment;
use App\Entities\Admin\core\TreatmentLanguage;
use DB;

class Helper
{
	private static function baseLanguageId()
	{
		$data = Session::get('locale');

		return $data;
	}

	public static function baseLanguageName()
	{
		$data = Language::findOrFail(Session::get('locale'));

		return $data->code;
	}

	public static function language()
	{
		$data = language::all();

		return $data;
	}

	public static function baseInstagram()
	{
		$data = Parameter::where('key', 'instagram')->first();

		return $data->value;
	}

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
	
	public static function removeTags($tags)
	{
		$data = str_replace('&nbsp;','',substr(strip_tags($tags), 0, 140)) . '...';

		return $data;
	}
    
    public static function slider()
	{
		$data = Slider::all();

		return $data;
	}

	public static function getCategory($id)
	{
		$data = Category::where('id_parent', $id)->get();

		return $data;
	}

	public static function treatment()
	{
		$data = Treatment::where('deleted_at', NULL)->get();

		return $data;
	}

	public static function instagram()
	{
		$data = Sosmed::where('deleted_at', NULL)
				->where('id_category', 53)
				->get();

		return $data;
	}

	public static function youtube()
	{
		$data = Sosmed::where('deleted_at', NULL)
				->where('id_category', 54)
				->get();

		return $data;
	}

	public static function cfacebook()
	{
		$data = Parameter::where('key', 'facebook')->first();

        return $data->value;
	}

	public static function cinstagram()
	{
        $data = Parameter::where('key', 'instagram')->first();

        return $data->value;
	}

	public static function cwhatsapp()
	{
        $data  = Parameter::where('key', 'whatsapp')->first();

        return $data->value;
	}

	public static function ctwitter()
	{
        $data   = Parameter::where('key', 'twitter')->first();

        return $data->value;
	}

	public static function cemail()
	{
        $data = Parameter::where('key', 'email')->first();

        return $data->value;
	}

	public static function descHome()
	{
		$data = Parameter::where('key', 'deskripsi_home')->first();

		return $data->value;
	}

	public static function MenuFrontPage()
	{
		$data = MenuFrontPage::where('id_sub_menu', 0)->where('is_active', 0)->get();

		return $data;
	}

	public static function childFrontPage($id)
	{
		$data = MenuFrontPage::where('id_sub_menu', $id)->where('is_active', 0)->get();

		return $data;
	}

	public static function getLanguageJudul($id)
	{
		$data = MenuFrontPageLanguage::where('id_menu_front_page', $id)->where('id_language', Session::get('locale'))->first();
	
		return $data->judul_menu;
	}
}