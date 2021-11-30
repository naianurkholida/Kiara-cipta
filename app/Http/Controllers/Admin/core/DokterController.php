<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Dokter;
use App\Entities\Admin\core\DokterLanguage;
use Carbon\Carbon;

class DokterController extends Controller
{
    public function index()
    {
        $data = Dokter::where('deleted_at', NULL)->get();

		return view('admin.core.dokter.index', compact('data'));
    }

    public function insert()
	{
		$pesan = '';
		$language = Language::all();
        $category = Category::where('id_parent', 44)->get();
        
		return view('admin.core.dokter.insert', compact('language', 'category', 'pesan'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_category'   => $request->kategori_dokter,
            'is_created'    => \Session::get('id'),
            'name'          => $request->name
        ];

        $dokter = Dokter::create($data);

        if ($request->image != NULL) {
            $dokter->addMedia($request->image)->toMediaCollection('dokter');
        }

        if($request->trigger == 1){
			foreach ($request->deskripsi as $key => $value) {
				$dokter_language = new DokterLanguage;
                $dokter_language->seo            = Str::slug($request->name);
                $dokter_language->id_dokter     = $dokter->id;
				$dokter_language->id_language    = $request->language[$key];
				$dokter_language->deskripsi 	  = $request->deskripsi[0];
                $dokter_language->save();
			}
		}else{
			foreach($request->deskripsi as $key => $value){
				if($request->deskripsi[$key] != null){
					$dokter_language = new DokterLanguage;
                    $dokter_language->seo            = Str::slug($request->name);
                    $dokter_language->id_dokter     = $dokter->id;
					$dokter_language->id_language    = $request->language[$key];
					$dokter_language->deskripsi 	  = $request->deskripsi[$key];
                    $dokter_language->save();
				}
			}
		}

        return redirect()->route('dokter.index')->with('success', 'Data Berhasil di Simpan');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
		$dokter_language = DokterLanguage::where('id_dokter', $id)->get();
        
        $data = $dokter->getFirstMediaUrl('dokter');

        $pesan = '';
		$language = Language::all();
        $category = Category::where('id_parent', 44)->get();

        return view('admin.core.dokter.edit', compact('data', 'dokter','language', 'category', 'pesan', 'dokter_language'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'id_category'   => $request->kategori_dokter,
            'name'          => $request->name
        ];

        $dokter = Dokter::findOrFail($id);
        $dokter->update($data);

        if($request->trigger == 1){
			foreach ($request->deskripsi as $key => $value) {
				$ceker = DokterLanguage::where('id_language', $request->language[$key])->where('id_dokter', $id)->count();
				if($ceker == 1){
					$dokter_language = DokterLanguage::where('id', $request->idl[$key])->first();
					$dokter_language->seo 			  = Str::slug($request->name);
					$dokter_language->id_dokter     = $dokter->id;
					$dokter_language->id_language    = $request->language[$key];
					$dokter_language->deskripsi 	  = $request->deskripsi[0];		
					$dokter_language->save();
				}else{
					$dokter_language = new DokterLanguage;
					$dokter_language->seo 			  = Str::slug($request->name);	
					$dokter_language->id_dokter     = $dokter->id;
					$dokter_language->id_language    = $request->language[$key];
					$dokter_language->deskripsi 	  = $request->deskripsi[0];		
					$dokter_language->save();
				}
			}
		}else{
			foreach($request->deskripsi as $key => $value){
				if($request->deskripsi[$key] != null){
					$ceker = DokterLanguage::where('id_language', $request->language[$key])->where('id_dokter', $id)->count();
					if($ceker == 1){
						$dokter_language = DokterLanguage::where('id', $request->idl[$key])->first();
						$dokter_language->seo 			  = Str::slug($request->name);	
						$dokter_language->id_dokter     = $dokter->id;
						$dokter_language->id_language    = $request->language[$key];
						$dokter_language->deskripsi 	  = $request->deskripsi[$key];		
						$dokter_language->save();
					}else{
						$dokter_language = new DokterLanguage;
						$dokter_language->seo 			  = Str::slug($request->name);	
						$dokter_language->id_dokter     = $dokter->id;
						$dokter_language->id_language    = $request->language[$key];
						$dokter_language->deskripsi 	  = $request->deskripsi[$key];		
						$dokter_language->save();
					}
				}
			}
        }

        if ($request->image != NULL) {
            $media = $dokter->getFirstMedia('dokter');

            if ($media != NULL) {
                $media->delete();
            }

            $dokter->addMedia($request->image)->toMediaCollection('dokter');
        }

        return redirect()->route('dokter.index')->with('info', 'Data Berhasil di Update');;
	}
	
	public function delete($id)
	{
		$dokter = Dokter::findOrFail($id);

		$data = [
			'deleted_at'	=> Carbon::now()
        ];
        
        $media = $dokter->getFirstMedia('dokter');

        if ($media != NULL) {
            $media->delete();
        }

		$dokter->update($data);

		return redirect()->route('dokter.index')->with('danger', 'Data Berhasil di Hapus');;
	}
}
