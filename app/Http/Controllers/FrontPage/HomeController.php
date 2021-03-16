<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Treatment;
use App\Entities\FrontPage\Pengunjung;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->view = 'frontend.home';

        $language = Language::first()->id;

        $locale = Session::get('locale');

        if ($locale == NULL) {
            $locale = Session::put('locale', $language);
        }

        $cekip = Pengunjung::where('ip', $request->ip())->first();

        if($cekip == null){
            $pengunjung = new Pengunjung;
            $pengunjung->ip = $request->ip();
            $pengunjung->save();
        }
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view($this->view);
    }

    public function jurnalListJson()
    {
        $data = Posting::with('getPostingLanguage')
                ->whereIn('id_category', [58,51])
                ->get();

        return response()->json($data);
    }

    public function produkListJson()
    {
        $data = Produk::with('getProdukLanguage')->where('deleted_at', null)->get();
    
        return response()->json($data);
    }

    public function treatmentListJson()
    {
        $data = Treatment::with('getTreatmentLanguage')->where('deleted_at', null)->get();

        return response()->json($data);
    }

    public function getSubMenuById()
    {
        $data = MenuFrontPage::with('getMenuFrontPageLanguage')->whereIn('id_sub_menu', [19,20,21,22,23,24])->get();

        return response()->json($data);
    }
}
