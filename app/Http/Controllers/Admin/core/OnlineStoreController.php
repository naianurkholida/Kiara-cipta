<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use File;

use App\Entities\Admin\core\OnlineStore;

class OnlineStoreController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/derma_online_store';
        //Definisi Dimensi Foto
		$this->dimensions = ['500'];
	}

    public function index () 
    {
        $data = OnlineStore::where('deleted_at', NULL)->get();

		return view('admin.core.online_store.index', compact('data'));
    }

    public function insert () 
    {
        return view('admin.core.online_store.insert');
    }

    public function store (Request $request) 
    {
    	#upload foto to database
		$file = $request->file('image');

        #JIKA FOLDERNYA BELUM ADA
		if (!File::isDirectory($this->path)) {
            #MAKA FOLDER TERSEBUT AKAN DIBUAT
			File::makeDirectory($this->path);
		}

		if ($file) {
			#MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
			$fileName = 'OnlineStore' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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
        

        $data = [
            'name'  => $request->os_name,
			'link'	=> $request->os_link,
        ];

		if ($file)
			$data['icon'] = $this->path . '/' . $fileName;

        $online_store = OnlineStore::create($data);

        return redirect()->route('online_store.index')->with('success', 'Data Berhasil di Simpan');
    }

    public function edit ($id) 
    {
        $data = OnlineStore::findOrFail($id);

        return view('admin.core.online_store.edit', compact('data'));
    }

    public function update (Request $request, $id) {
    	#upload foto to database
		$file = $request->file('image');

        #JIKA FOLDERNYA BELUM ADA
		if (!File::isDirectory($this->path)) {
            #MAKA FOLDER TERSEBUT AKAN DIBUAT
			File::makeDirectory($this->path);
		}

		if ($file) {
			#MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
			$fileName = 'OnlineStore' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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


        $data = [
            'name'  => $request->os_name,
			'link'	=> $request->os_link,
        ];

		if ($file)
			$data['icon'] = $this->path . '/' . $fileName;

        $online_store = OnlineStore::findOrFail($id);

		if ($file) {
			File::delete($online_store->icon);

            $compressed_loc = str_replace($this->path,$this->path.'/500/',$online_store->icon);
			File::delete($compressed_loc);
		}

        $online_store->update($data);

        return redirect()->route('online_store.index')->with('info', 'Data Berhasil di Update');
    }

    public function delete ($id) {
		$data = [
			'deleted_at' => Carbon::now()
		];

		$online_store = OnlineStore::findOrFail($id);
		$online_store->update($data);

		return redirect()->route('online_store.index')->with('danger', 'Data Berhasil di Hapus');
    }
}
