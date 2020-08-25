<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Parameter;
use App\Entities\FrontPage\Pengunjung;
use App\Entities\Admin\core\Produk;

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

    public static function produkListJson()
    {
        $data = Produk::with('getProdukLanguage')->where('deleted_at', null)->get();
    
        return response()->json($data);
    }
}
