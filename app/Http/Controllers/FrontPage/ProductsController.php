<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\ProdukImage;
use App\Entities\Admin\core\ProdukLanguage;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Language;
use App\Entities\FrontPage\LogClick;

class ProductsController extends Controller
{
    public function __construct(Request $request)
    {
        $language = Language::first()->id;

        $locale = Session::get('locale');

        if ($locale == NULL) {
            $locale = Session::put('locale', $language);
        }
    }

    public function index()
    {
        $category = null;
        $data = Produk::with('getProdukLanguage','getSpec')
                ->where('deleted_at', NULL)
                ->get();

                $data = $data->sortBy(function ($data, $key)
                {
                    return $data->getProdukLanguage->judul;
                });

        return view('frontend.products', compact('data', 'category'));
    }

    public function show($id)
    {

        $dataLanguage = ProdukLanguage::where('seo', $id)->where('deleted_at',null)->first();

        $data = Produk::where('deleted_at',null)->findOrFail($dataLanguage->id_produk);

        $detailGambar = ProdukImage::where('id_produk', $dataLanguage->id_produk)->orderBy('id', 'desc')->limit(5)->get();

        $this->logClick($dataLanguage->id_produk);
        return view('frontend.products-detail', compact('data', 'detailGambar'));
    }

    public function showByCategory ($category) 
    {
        $category = Category::where('seo',$category)->first();
        $data = Produk::with('getProdukLanguage')
                    ->where('deleted_at', NULL)
                    ->where('id_category', $category->id)
                    ->get();

        $data = $data->sortBy(function ($data, $key)
        {
            return $data->getProdukLanguage->judul;
        });

        return view('frontend.products', compact('data','category'));
    }

    public function logClick($product_id)
    {
        $no_telp = $_COOKIE['username'];

        $data = LogClick::where('no_telp', $no_telp)->where('tanggal', date('Y-m-d'))->first();

        if($data == null){
            $data = new LogClick;
            $data->id_product = $product_id;
            $data->no_telp = $no_telp;
            $data->tanggal = date('Y-m-d');
            $data->save(); 
        }

        return $data;
    }
}
