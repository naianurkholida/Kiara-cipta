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
use DB;
use Image;
use File;

class TreatmentController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/derma_treatment';
        //Definisi Dimensi Foto
		$this->dimensions = ['500'];
	}

    public function index()
    {
        $data = Treatment::with('getTreatmentLanguage')->where('deleted_at', NULL)->get();

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
        #upload foto to database
		$file = $request->file('image');

        #JIKA FOLDERNYA BELUM ADA
		if (!File::isDirectory($this->path)) {
            #MAKA FOLDER TERSEBUT AKAN DIBUAT
			File::makeDirectory($this->path);
		}

        #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
		$fileName = 'Treatment' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

		$size   = getimagesize($file);
		$width  = $size[0];
		$height = $size[1];

		if($width > $height){
			$size = ($width/$height);
		}else{
			$size = ($height/$width);
		}

        #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
		Image::make($file)->save($this->path . '/' . $fileName);
		foreach ($this->dimensions as $row) {
            #MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
			if($width < $height){
				$canvas = Image::canvas($row, ceil($row*$size));
				$resizeImage  = Image::make($file)->resize($row, ceil($row*$size), function($constraint) {
					$constraint->aspectRatio();
				});
			}else{
				$canvas = Image::canvas(($row*$size), $row);
				$resizeImage  = Image::make($file)->resize(ceil($row*$size), $row, function($constraint) {
					$constraint->aspectRatio();
				});
			}

            #CEK JIKA FOLDERNYA BELUM ADA
			if (!File::isDirectory($this->path . '/' . $row)) {
                #MAKA BUAT FOLDER DENGAN NAMA DIMENSI
				File::makeDirectory($this->path . '/' . $row);
			}

            #MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
			$canvas->insert($resizeImage, 'center');
            #SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
          
			$canvas->save($this->path . '/500/' . $fileName);
		}

		$data = [
            'id_category'   => $request->kategori_treatment,
            'is_created'    => \Session::get('id'),
            'image'			=> $fileName
        ];

        $treatment = Treatment::create($data);

        if($request->trigger == 1){
			foreach ($request->judul as $key => $value) {
				$treatment_language = new TreatmentLanguage;
                $treatment_language->seo              = Str::slug($request->judul[0]);
                $treatment_language->id_treatment     = $treatment->id;
				$treatment_language->id_language      = $request->language[$key];
				$treatment_language->judul 	          = $request->judul[0];
				$treatment_language->resume           = $request->resume[0];
				$treatment_language->deskripsi 	      = $request->deskripsi[0];
                $treatment_language->save();
			}
		}else{
			foreach($request->judul as $key => $value){
				if($request->judul[$key] != null){
					$treatment_language = new TreatmentLanguage;
                    $treatment_language->seo            = Str::slug($request->judul[$key]);
                    $treatment_language->id_treatment   = $treatment->id;
					$treatment_language->id_language    = $request->language[$key];
					$treatment_language->judul 	      	= $request->judul[$key];
					$treatment_language->resume         = $request->resume[$key];
					$treatment_language->deskripsi 	  	= $request->deskripsi[$key];
                    $treatment_language->save();
				}
			}
		}

        return redirect()->route('treatment.index')->with('success', 'Data Berhasil di Simpan');
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
    	#upload foto to database
		$file = $request->file('image');

        #JIKA FOLDERNYA BELUM ADA
		if (!File::isDirectory($this->path)) {
            #MAKA FOLDER TERSEBUT AKAN DIBUAT
			File::makeDirectory($this->path);
		}

        #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
		$fileName = 'Treatment' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

		$size   = getimagesize($file);
		$width  = $size[0];
		$height = $size[1];

		if($width > $height){
			$size = ($width/$height);
		}else{
			$size = ($height/$width);
		}

        #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
		Image::make($file)->save($this->path . '/' . $fileName);
		foreach ($this->dimensions as $row) {
            #MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
			if($width < $height){
				$canvas = Image::canvas($row, ceil($row*$size));
				$resizeImage  = Image::make($file)->resize($row, ceil($row*$size), function($constraint) {
					$constraint->aspectRatio();
				});
			}else{
				$canvas = Image::canvas(($row*$size), $row);
				$resizeImage  = Image::make($file)->resize(ceil($row*$size), $row, function($constraint) {
					$constraint->aspectRatio();
				});
			}

            #CEK JIKA FOLDERNYA BELUM ADA
			if (!File::isDirectory($this->path . '/' . $row)) {
                #MAKA BUAT FOLDER DENGAN NAMA DIMENSI
				File::makeDirectory($this->path . '/' . $row);
			}

            #MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
			$canvas->insert($resizeImage, 'center');
            #SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
          
			$canvas->save($this->path . '/500/' . $fileName);
		}

        $data = [
            'id_category'   => $request->kategori_treatment,
            'image'         => $fileName
        ];

        $treatment = treatment::findOrFail($id);

        File::delete($this->path.'/'.$treatment->image);
        File::delete($this->path.'/500/'.$treatment->image);

        $treatment->update($data);

        if($request->trigger == 1){
			foreach ($request->judul as $key => $value) {
				$ceker = TreatmentLanguage::where('id_language', $request->language[$key])->where('id_treatment', $id)->count();
				if($ceker == 1){
					$treatment_language = TreatmentLanguage::where('id', $request->idl[$key])->first();
					$treatment_language->seo 			  = Str::slug($request->judul[0]);
					$treatment_language->id_treatment     = $treatment->id;
					$treatment_language->id_language      = $request->language[$key];
					$treatment_language->judul 	      	  = $request->judul[0];
					$treatment_language->resume           = $request->resume[0];
					$treatment_language->deskripsi 	      = $request->deskripsi[0];		
					$treatment_language->save();
				}else{
					$treatment_language = new TreatmentLanguage;
					$treatment_language->seo 			  = Str::slug($request->judul[0]);	
					$treatment_language->id_treatment     = $treatment->id;
					$treatment_language->id_language      = $request->language[$key];
					$treatment_language->judul 	          = $request->judul[0];
					$treatment_language->resume           = $request->resume[0];
					$treatment_language->deskripsi 	      = $request->deskripsi[0];		
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
						$treatment_language->id_language      = $request->language[$key];
						$treatment_language->judul 	          = $request->judul[$key];
						$treatment_language->resume           = $request->resume[$key];
						$treatment_language->deskripsi 	      = $request->deskripsi[$key];		
						$treatment_language->save();
					}else{
						$treatment_language = new TreatmentLanguage;
						$treatment_language->seo 			  = Str::slug($request->judul[$key]);	
						$treatment_language->id_treatment     = $treatment->id;
						$treatment_language->id_language      = $request->language[$key];
						$treatment_language->judul 	          = $request->judul[$key];
						$treatment_language->resume           = $request->resume[$key];
						$treatment_language->deskripsi 	      = $request->deskripsi[$key];		
						$treatment_language->save();
					}
				}
			}
        }

        return redirect()->route('treatment.index')->with('info', 'Data Berhasil di Update');
	}
	
	public function delete($id)
	{
		$treatment = treatment::findOrFail($id);
		$data = [
			'deleted_at'	=> Carbon::now()
		];

		$treatment->update($data);

		return redirect()->route('treatment.index')->with('danger', 'Data Berhasil di Hapus');
	}
}
