<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\ProdukImage;
use App\Entities\Admin\core\ProdukLanguage;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Language;
use App\Entities\FrontPage\LogClick;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $category = null;
        $data = Produk::with('getProdukLanguage','getSpec', 'getCategory')
                ->where('deleted_at', NULL)
                ->whereHas('getCategory', function($q){
                    $q->where('seo', 'promo');
                })
                ->get();

                $data = $data->sortBy(function ($data, $key)
                {
                    return $data->getProdukLanguage->judul;
                });

        return view('frontend.event', compact('data', 'category'));
    }
}
