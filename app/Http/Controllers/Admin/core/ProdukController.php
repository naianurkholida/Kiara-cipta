<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Role as Role;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\ProdukLanguage;
use Carbon\Carbon;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::where('deleted_at', NULL)->get();

		return view('admin.core.produk.index', compact('data'));
    }

    public function insert()
	{
		$pesan = '';
		$language = Language::all();
        $category = Category::where('id_parent', 36)->get();
        
		return view('admin.core.produk.insert', compact('language', 'category', 'pesan'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_category'   => $request->kategori_produk,
            'is_created'    => \Session::get('id')
        ];

        $produk = Produk::create($data);

        foreach ($request->input('document', []) as $file) {
            $produk->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('produk');
        }

        if($request->trigger == 1){
			foreach ($request->judul as $key => $value) {
				$produk_language = new ProdukLanguage;
                $produk_language->seo            = Str::slug($request->judul[0]);
                $produk_language->id_produk     = $produk->id;
				$produk_language->id_language    = $request->language[$key];
				$produk_language->judul 	      = $request->judul[0];
				$produk_language->deskripsi 	  = $request->deskripsi[0];
                $produk_language->save();
			}
		}else{
			foreach($request->judul as $key => $value){
				if($request->judul[$key] != null){
					$produk_language = new ProdukLanguage;
                    $produk_language->seo            = Str::slug($request->judul[$key]);
                    $produk_language->id_produk     = $produk->id;
					$produk_language->id_language    = $request->language[$key];
					$produk_language->judul 	      = $request->judul[$key];
					$produk_language->deskripsi 	  = $request->deskripsi[$key];
                    $produk_language->save();
				}
			}
		}

        return redirect()->route('produk.index')->with('success', 'Data Berhasil di Simpan');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
		$produk_language = ProdukLanguage::where('id_produk', $id)->get();
        
        $data = $produk->getMedia('produk');

        $pesan = '';
		$language = Language::all();
        $category = Category::where('id_parent', 36)->get();

        return view('admin.core.produk.edit', compact('data', 'produk','language', 'category', 'pesan', 'produk_language'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'id_category'   => $request->kategori_produk
        ];

        $produk = Produk::findOrFail($id);
        $produk->update($data);

        if($request->trigger == 1){
			foreach ($request->judul as $key => $value) {
				$ceker = ProdukLanguage::where('id_language', $request->language[$key])->where('id_produk', $id)->count();
				if($ceker == 1){
					$produk_language = ProdukLanguage::where('id', $request->idl[$key])->first();
					$produk_language->seo 			  = Str::slug($request->judul[0]);
					$produk_language->id_produk     = $produk->id;
					$produk_language->id_language    = $request->language[$key];
					$produk_language->judul 	      = $request->judul[0];
					$produk_language->deskripsi 	  = $request->deskripsi[0];		
					$produk_language->save();
				}else{
					$produk_language = new ProdukLanguage;
					$produk_language->seo 			  = Str::slug($request->judul[0]);	
					$produk_language->id_produk     = $produk->id;
					$produk_language->id_language    = $request->language[$key];
					$produk_language->judul 	      = $request->judul[0];
					$produk_language->deskripsi 	  = $request->deskripsi[0];		
					$produk_language->save();
				}
			}
		}else{
			foreach($request->judul as $key => $value){
				if($request->judul[$key] != null){
					$ceker = ProdukLanguage::where('id_language', $request->language[$key])->where('id_produk', $id)->count();
					if($ceker == 1){
						$produk_language = ProdukLanguage::where('id', $request->idl[$key])->first();
						$produk_language->seo 			  = Str::slug($request->judul[$key]);	
						$produk_language->id_produk     = $produk->id;
						$produk_language->id_language    = $request->language[$key];
						$produk_language->judul 	      = $request->judul[$key];
						$produk_language->deskripsi 	  = $request->deskripsi[$key];		
						$produk_language->save();
					}else{
						$produk_language = new ProdukLanguage;
						$produk_language->seo 			  = Str::slug($request->judul[$key]);	
						$produk_language->id_produk     = $produk->id;
						$produk_language->id_language    = $request->language[$key];
						$produk_language->judul 	      = $request->judul[$key];
						$produk_language->deskripsi 	  = $request->deskripsi[$key];		
						$produk_language->save();
					}
				}
			}
        }

        if (count($produk->getMedia('produk')) > 0) {
            foreach ($produk->getMedia('produk') as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $produk->getMedia('produk')->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $produk->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('produk');
            }
        }

        return redirect()->route('produk.index')->with('info', 'Data Berhasil di Update');
	}
	
	public function delete($id)
	{
		$produk = Produk::findOrFail($id);

		$data = [
			'deleted_at'	=> Carbon::now()
		];

		$produk->update($data);

		return redirect()->route('produk.index')->with('danger', 'Data Berhasil di Hapus');
	}
}
