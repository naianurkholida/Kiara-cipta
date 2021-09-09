<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\ProdukSpecification as ProdukSpec;
use Carbon\Carbon;
use Image;
use File;

class ProdukSpecificationController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/derma_produk_spec';
        //Definisi Dimensi Foto
		$this->dimensions = ['500'];
	}

    public function index ($id_produk) 
    {
        $produk = Produk::with('getProdukLanguage')
                        ->findOrFail($id_produk);

		$data = ProdukSpec::where('id_produk',$id_produk)
						->get();

        $img_path = $this->path;

		return view('admin.core.produk.spec.index', compact('produk','data','img_path','id_produk'));
    }

    public function insert ($id_produk) 
    {   
        $produk = Produk::with('getProdukLanguage')
                        ->findOrFail($id_produk);

		return view('admin.core.produk.spec.insert', compact('id_produk','produk'));
    }

    public function store (Request $req, $id_produk) 
    {
        $data = [];
        foreach ($req->specification as $key => $value) {
            #upload foto to database
            $file = $req->file('image-light')[$key];
            $file2 = $req->file('image-dark')[$key];
    
            #JIKA FOLDERNYA BELUM ADA
            if (!File::isDirectory($this->path)) {
                #MAKA FOLDER TERSEBUT AKAN DIBUAT
                File::makeDirectory($this->path);
            }
    
            if ($file) {
                #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
                $fileName = 'Spec' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();
    
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
            }
    
            if ($file2) {
                #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
                $fileName2 = 'SpecDark' . '_' .date('Ymdhis'). '.' . $file2->getClientOriginalExtension();
    
                $size   = getimagesize($file2);
                $width  = $size[0];
                $height = $size[1];
    
                if($width > $height){
                    $size = ($width/$height);
                }else{
                    $size = ($height/$width);
                }
    
                #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
                Image::make($file2)->save($this->path . '/' . $fileName2);
                foreach ($this->dimensions as $row) {
                    #MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
                    if($width < $height){
                        $canvas = Image::canvas($row, ceil($row*$size));
                        $resizeImage2  = Image::make($file2)->resize($row, ceil($row*$size), function($constraint) {
                            $constraint->aspectRatio();
                        });
                    }else{
                        $canvas = Image::canvas(($row*$size), $row);
                        $resizeImage2  = Image::make($file2)->resize(ceil($row*$size), $row, function($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
    
                    #CEK JIKA FOLDERNYA BELUM ADA
                    if (!File::isDirectory($this->path . '/' . $row)) {
                        #MAKA BUAT FOLDER DENGAN NAMA DIMENSI
                        File::makeDirectory($this->path . '/' . $row);
                    }
    
                    #MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
                    $canvas->insert($resizeImage2, 'center');
                    #SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
                
                    $canvas->save($this->path . '/500/' . $fileName2);
                }
            }
    
            $data[$key] = [
                'id_produk'     => $id_produk,
                'specification' => $req->specification[$key],
                'is_active'     => $req->status[$key],
                'created_at'    => date("Y-m-d h:i:s"),
                'updated_at'    => date("Y-m-d h:i:s"),
            ];
    
            if ($file)
                $data[$key]['icon_light'] = $fileName;

            if ($file2)
                $data[$key]['icon_dark'] = $fileName2;
        }

        $spec = ProdukSpec::insert($data);

        return redirect()->route('produk.spec.index',$id_produk)->with('success', 'Data Berhasil di Simpan');
    }

    public function edit ($id) 
    {
        $data = ProdukSpec::findOrFail($id);
        $produk = Produk::with('getProdukLanguage')
                        ->findOrFail($data->id_produk);

        return view('admin.core.produk.spec.edit', compact('data','produk'));
    }

    public function update (Request $req, $id) 
    {
    	#upload foto to database
		$file = $req->file('image-light');
		$file2 = $req->file('image-dark');

        #JIKA FOLDERNYA BELUM ADA
		if (!File::isDirectory($this->path)) {
            #MAKA FOLDER TERSEBUT AKAN DIBUAT
			File::makeDirectory($this->path);
		}

		if ($file) {
			#MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
			$fileName = 'Spec' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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
		}

		if ($file2) {
			#MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
			$fileName2 = 'SpecDark' . '_' .date('Ymdhis'). '.' . $file2->getClientOriginalExtension();

			$size   = getimagesize($file2);
			$width  = $size[0];
			$height = $size[1];

			if($width > $height){
				$size = ($width/$height);
			}else{
				$size = ($height/$width);
			}

			#UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA
			Image::make($file2)->save($this->path . '/' . $fileName2);
			foreach ($this->dimensions as $row) {
				#MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
				if($width < $height){
					$canvas = Image::canvas($row, ceil($row*$size));
					$resizeImage2  = Image::make($file2)->resize($row, ceil($row*$size), function($constraint) {
						$constraint->aspectRatio();
					});
				}else{
					$canvas = Image::canvas(($row*$size), $row);
					$resizeImage2  = Image::make($file2)->resize(ceil($row*$size), $row, function($constraint) {
						$constraint->aspectRatio();
					});
				}
	
				#CEK JIKA FOLDERNYA BELUM ADA
				if (!File::isDirectory($this->path . '/' . $row)) {
					#MAKA BUAT FOLDER DENGAN NAMA DIMENSI
					File::makeDirectory($this->path . '/' . $row);
				}
	
				#MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
				$canvas->insert($resizeImage2, 'center');
				#SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
			  
				$canvas->save($this->path . '/500/' . $fileName2);
			}
		}
    
        $data = [
            'specification' => $req->specification,
            'is_active'     => $req->status,
        ];

        if ($file)
            $data['icon_light'] = $fileName;

        if ($file2)
            $data['icon_dark'] = $fileName2;

        $spec = ProdukSpec::findOrFail($id);

		if ($file) {
			File::delete($this->path.'/'.$spec->icon_light);
			File::delete($this->path.'/500/'.$spec->icon_light);
		}

		if ($file2) {
			File::delete($this->path.'/'.$spec->icon_dark);
			File::delete($this->path.'/500/'.$spec->icon_dark);
		}

        $spec->specification = $data['specification'];
        $spec->is_active = $data['is_active'];
        if ($file)
            $spec->icon_light = $data['icon_light'];
        if($file2)
            $spec->icon_dark = $data['icon_dark'];

        // $spec->update($data);
        $spec->save();

        return redirect()->route('produk.spec.index',$spec->id_produk)->with('info', 'Data Berhasil di Update');
    }
    
    public function delete ($id) 
    {

        $spec = ProdukSpec::findOrFail($id);
        $id_produk = Produk::find($spec->id_produk)->id;

        File::delete($this->path.'/'.$spec->icon);
        File::delete($this->path.'/500/'.$spec->icon);

        $spec->delete();

		return redirect()->route('produk.spec.index',$id_produk)->with('danger', 'Data Berhasil di Hapus');
    }
}
