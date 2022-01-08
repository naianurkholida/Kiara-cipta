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
        $data = Produk::with('getProdukLanguage','getSpec','getCategory')
                ->where('deleted_at', NULL)
                ->whereHas('getCategory', function($q) {
                    $q->where('seo', '!=', 'tukar-poin')
                    ->Where('seo', '!=', 'promo');
                })
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

        $this->logClick($dataLanguage->id_produk, $dataLanguage->judul, $data->image);
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

    public function logClick($product_id, $nama_product, $url)
    {
        $no_telp = session::get('customer_no_telp');
        $expire = date('Y-m-d', strtotime("+45 day"));

        if($no_telp != null && $no_telp != ''){
            $customer =  LogClick::where('no_telp', $no_telp)->orderBy('tanggal', 'desc')->first();

            $data = LogClick::where('no_telp', $no_telp)->where('tanggal', date('Y-m-d'))->first();

            if($data != null){  
            	/* jika user click produk lebih dari 1 produk, hapus data sebelumnya input yang baru */

            	LogClick::where('no_telp', $no_telp)->where('tanggal', date('Y-m-d'))->delete();

            	$data = new LogClick;
            	$data->id_product = $product_id;
            	$data->nama_product = $nama_product;
            	$data->url_product = $url;
            	$data->no_telp = $no_telp;
            	$data->customer_id = session::get('customer_id');
            	$data->customer_name = session::get('customer_name');
                $data->customer_email = session::get('customer_email');
            	$data->tanggal = date('Y-m-d');
            	$data->tanggal_expire = $expire;
            	$data->save(); 

            }else{
            	if($customer != null){
            		/* cek tanggal hari ini dengan tanggal expire blast customer nya */
            		if(strtotime(date('Y-m-d')) > strtotime($customer->tanggal_expire)){
            			$data = new LogClick;
            			$data->id_product = $product_id;
            			$data->nama_product = $nama_product;
            			$data->url_product = $url;
            			$data->no_telp = $no_telp;
            			$data->customer_id = session::get('customer_id');
            			$data->customer_name = session::get('customer_name');
                        $data->customer_email = session::get('customer_email');
            			$data->tanggal = date('Y-m-d');
            			$data->tanggal_expire = $expire;
            			$data->save(); 
            		}
            	}else{
            		/* input data jika customer belum pernah terdaftar */
            		$data = new LogClick;
            		$data->id_product = $product_id;
            		$data->nama_product = $nama_product;
            		$data->url_product = $url;
            		$data->no_telp = $no_telp;
            		$data->customer_id = session::get('customer_id');
            		$data->customer_name = session::get('customer_name');
                    $data->customer_email = session::get('customer_email');
            		$data->tanggal = date('Y-m-d');
            		$data->tanggal_expire = $expire;
            		$data->save(); 
            	}
            }
        }
        return $data;
    }
}
