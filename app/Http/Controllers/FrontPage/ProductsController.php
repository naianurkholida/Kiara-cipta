<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\ProdukLanguage;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Language;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $data = Produk::with('getProdukLanguage')
                ->where('deleted_at', NULL)
                ->get();

                $data = $data->sortBy(function ($data, $key)
                {
                    return $data->getProdukLanguage->judul;
                });

        return view('frontend.products', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataLanguage = ProdukLanguage::where('seo', $id)->where('deleted_at',null)->firstOrFail();

        $data = Produk::where('deleted_at',null)->findOrFail($dataLanguage->id_produk);

        return view('frontend.products-detail', compact('data'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
