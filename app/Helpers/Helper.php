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
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\BestSellerIcon;
use App\Entities\Admin\core\OnlineStore;
use App\Entities\Admin\core\ProfileCabang;
use DB;

class Helper
{
	private static function baseLanguageId()
	{
		$data = Session::get('locale');

		return $data;
	}

	public static function iklan()
	{
		$data = Parameter::where('key', 'iklan')->first();

		$img = 'assets/admin/assets/media/img/'.$data->value;
		return $img;
	}

	public static function kategoriProdukList()
	{
		$data = Category::where('id_parent',36)
						->where('deleted_at', null)
						->orderBy('order_num', 'asc')
						->get();

		return $data;
	}
	
	public static function produkList()
	{
		$data = Produk::with('getProdukLanguage')->where('deleted_at', null)->get();

				$data = $data->sortBy(function ($data, $key)
                {
                    return $data->getProdukLanguage->judul;
                });
	
		return $data;
	}

	public static function produkListBestSeller()
	{
		$data = BestSellerIcon::with('produk','produk.getProdukLanguage','produk.getCategory','produk.getSpec')
							->where('deleted_at', null)
							->get();
		
		return $data;
	}

	public static function iconProdukBestSeller($id)
	{
		$data = BestSellerIcon::where('product_id', $id)->get();

		return $data;
	}

	public static function produkListId()
	{
		$data = Produk::with('getProdukLanguage')->where('deleted_at', null)->get();

				$data = $data->sortBy(function ($data, $key)
                {
                    return $data->getProdukLanguage->judul;
                });
		
		return count($data);
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
		$data = str_replace('&nbsp;',' ',substr(strip_tags($tags), 0, 140)) . '...';

		return $data;
	}
    
    public static function slider()
	{
		$data = Slider::orderBy('order_num', 'ASC')->where('status', True)->get();
		return $data;
	}

	public static function getCategory($id)
	{
		$data = Category::where('id_parent', $id)->get();

		return $data;
	}

	public static function treatment()
	{
		$data = Treatment::with('getTreatmentLanguage')->where('deleted_at', NULL)->get();

		return $data;
	}

	public static function treatmentPage()
	{
		$data = Treatment::with('getTreatmentLanguage')->where('deleted_at', NULL)->limit(3)->get();

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
				->orderBy('id', 'DESC')
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

	public static function cyoutube()
	{
		$data = Parameter::where('key', 'youtube')->first();

        return $data->value;
	}

	public static function descHome()
	{
		$data = Parameter::where('key', 'deskripsi_home')->first();

		return $data->value;
		
	}

	public static function MenuFrontPage()
	{
		$data = MenuFrontPage::where('id_sub_menu', 0)->where('is_active', 0)->orderBy('sort_order', 'ASC')->get();

		return $data;
	}

	public static function MenuJurnal()
	{
		$data = MenuFrontPage::where('id_sub_menu', 16)->where('is_active', 0)->orderBy('sort_order', 'ASC')->get();

		return $data;
	}

	public static function getJurnal()
	{
		$data = Posting::with('getPostingLanguage', 'category')->whereIn('id_category', [58,51])->get();

		return $data;
	}

	public static function childFrontPage($id)
	{
		$data = MenuFrontPage::where('id_sub_menu', $id)->where('is_active', 0)->get();

		return $data;
	}

	public static function childFrontPageArray($id)
	{
		$data = MenuFrontPage::whereIn('id_sub_menu', $id)->where('is_active', 0)->get();
		return $data;
	}

	public static function getLanguageJudul($id)
	{
		$data = MenuFrontPageLanguage::where('id_menu_front_page', $id)->where('id_language', Session::get('locale'))->first();
	
		return $data->judul_menu;
	}

	public static function tanggal_indonesia($tgl, $tampil_hari=true){
		$nama_hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$nama_bulan = array (
			1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
			"September", "Oktober", "November", "Desember");
		$tahun=substr($tgl,0,4);
		$bulan=$nama_bulan[(int)substr($tgl,5,2)];
		$tanggal=substr($tgl,8,2);
		$text="";
		if ($tampil_hari) {
			$urutan_hari=date('w', mktime(0,0,0, substr($tgl,5,2), $tanggal, $tahun));
			$hari=$nama_hari[$urutan_hari];
			$text .= $hari.", ";
		}
		$text .=$tanggal ." ". $bulan ." ". $tahun;
		return $text;
	}

	public static function posting()
	{
		$data = Posting::with('getPostingLanguage')
				->where('id_category', 58)
				->get();

		return $data;
	}

	public static function getCity()
	{
		// persiapkan curl
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://103.11.135.246:1506/city");

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // tutup curl 
        curl_close($ch);      

        // menampilkan hasil curl
        $data = json_decode($output);

        return $data;
	}

	public static function online_store()
	{
		$data = OnlineStore::where('deleted_at', NULL)
				->orderBy('updated_at', 'desc')
				->get();

		return $data;
	}

	public static function profile_cabang()
	{
		$data = ProfileCabang::with('detail')
							->where('is_active', 1)
							->where('deleted_at', null)
							->get();

		return $data;
	}
}