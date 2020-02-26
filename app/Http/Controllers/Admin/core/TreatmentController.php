<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Role as Role;
use App\Entities\Admin\core\Treatment;
use App\Entities\Admin\core\TreatmentLanguage;
use Carbon\Carbon;

class TreatmentController extends Controller
{
    public function index()
    {
        $data = Treatment::where('deleted_at', NULL)->get();

		return view('admin.core.treatment.index', compact('data'));
    }

    public function insert()
	{
		$pesan = '';
		$language = Language::all();
        $category = Category::where('id_parent', 47)->get();
        
		return view('admin.core.treatment.insert', compact('language', 'category', 'pesan'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_category'   => $request->kategori_treatment,
            'is_created'    => \Session::get('id')
        ];

        $treatment = Treatment::create($data);

        foreach ($request->input('document', []) as $file) {
            $treatment->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('treatment');
        }

        if($request->trigger == 1){
			foreach ($request->judul as $key => $value) {
				$treatment_language = new TreatmentLanguage;
                $treatment_language->seo            = Str::slug($request->judul[0]);
                $treatment_language->id_treatment     = $treatment->id;
				$treatment_language->id_language    = $request->language[$key];
				$treatment_language->judul 	      = $request->judul[0];
				$treatment_language->deskripsi 	  = $request->deskripsi[0];
                $treatment_language->save();
			}
		}else{
			foreach($request->judul as $key => $value){
				if($request->judul[$key] != null){
					$treatment_language = new TreatmentLanguage;
                    $treatment_language->seo            = Str::slug($request->judul[$key]);
                    $treatment_language->id_treatment     = $treatment->id;
					$treatment_language->id_language    = $request->language[$key];
					$treatment_language->judul 	      = $request->judul[$key];
					$treatment_language->deskripsi 	  = $request->deskripsi[$key];
                    $treatment_language->save();
				}
			}
		}

        return redirect()->route('treatment.index');
    }

    public function edit($id)
    {
        $treatment = treatment::findOrFail($id);
		$treatment_language = TreatmentLanguage::where('id_treatment', $id)->get();
        
        $data = $treatment->getMedia('treatment');

        $pesan = '';
		$language = Language::all();
        $category = Category::where('id_parent', 47)->get();

        return view('admin.core.treatment.edit', compact('data', 'treatment','language', 'category', 'pesan', 'treatment_language'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'id_category'   => $request->kategori_treatment
        ];

        $treatment = treatment::findOrFail($id);
        $treatment->update($data);

        if($request->trigger == 1){
			foreach ($request->judul as $key => $value) {
				$ceker = TreatmentLanguage::where('id_language', $request->language[$key])->where('id_treatment', $id)->count();
				if($ceker == 1){
					$treatment_language = TreatmentLanguage::where('id', $request->idl[$key])->first();
					$treatment_language->seo 			  = Str::slug($request->judul[0]);
					$treatment_language->id_treatment     = $treatment->id;
					$treatment_language->id_language    = $request->language[$key];
					$treatment_language->judul 	      = $request->judul[0];
					$treatment_language->deskripsi 	  = $request->deskripsi[0];		
					$treatment_language->save();
				}else{
					$treatment_language = new TreatmentLanguage;
					$treatment_language->seo 			  = Str::slug($request->judul[0]);	
					$treatment_language->id_treatment     = $treatment->id;
					$treatment_language->id_language    = $request->language[$key];
					$treatment_language->judul 	      = $request->judul[0];
					$treatment_language->deskripsi 	  = $request->deskripsi[0];		
					$treatment_language->save();
				}
			}
		}else{
			foreach($request->judul as $key => $value){
				if($request->judul[$key] != null){
					$ceker = TreatmentLanguage::where('id_language', $request->language[$key])->where('id_treatment', $id)->count();
					if($ceker == 1){
						$treatment_language = TreatmentLanguage::where('id', $request->idl[$key])->first();
						$treatment_language->seo 			  = Str::slug($request->judul[$key]);	
						$treatment_language->id_treatment     = $treatment->id;
						$treatment_language->id_language    = $request->language[$key];
						$treatment_language->judul 	      = $request->judul[$key];
						$treatment_language->deskripsi 	  = $request->deskripsi[$key];		
						$treatment_language->save();
					}else{
						$treatment_language = new TreatmentLanguage;
						$treatment_language->seo 			  = Str::slug($request->judul[$key]);	
						$treatment_language->id_treatment     = $treatment->id;
						$treatment_language->id_language    = $request->language[$key];
						$treatment_language->judul 	      = $request->judul[$key];
						$treatment_language->deskripsi 	  = $request->deskripsi[$key];		
						$treatment_language->save();
					}
				}
			}
        }

        if (count($treatment->getMedia('treatment')) > 0) {
            foreach ($treatment->getMedia('treatment') as $media) {
                if (!in_array($media->file_name, $request->input('document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $treatment->getMedia('treatment')->pluck('file_name')->toArray();

        foreach ($request->input('document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $treatment->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('treatment');
            }
        }

        return redirect()->route('treatment.index');
	}
	
	public function delete($id)
	{
		$treatment = treatment::findOrFail($id);

		$data = [
			'deleted_at'	=> Carbon::now()
		];

		$treatment->update($data);

		return redirect()->route('treatment.index');
	}
}
