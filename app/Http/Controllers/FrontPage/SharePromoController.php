<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Parameter;
use App\Entities\FrontPage\Pengunjung;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\PostingLanguage;

class SharePromoController extends Controller
{
    public function __construct(Request $request)
    {
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
    public function index(Request $request, $seo)
    {
    	return view('frontend.share_promo', compact('seo'));
    }

    public function iklan(Request $request)
    {
        $info_desc = Posting::join('posting_language', 'posting_language.id_posting', '=', 'posting.id')
                       ->join('category', 'category.id', '=', 'posting.id_category')
                       ->where('category.seo', 'popup-iklan')
                       ->where('posting_language.id_language', 1)
                       ->first();

        $email = $request->email;

        return view('frontend.share_iklan_khusus', compact('info_desc', 'email'));
    }

    public function store(Request $request)
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, 'http://103.11.135.246:1506/subscribe/?email='.$request->email);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);

        $data = 'Email Berhasil di Kirim !';
        return redirect()->back()->with('message', $data);
    }
}
