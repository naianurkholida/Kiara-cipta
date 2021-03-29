<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Gallery;
use Carbon\Carbon;
use Image;
use File;
use DB;

class GalleryController extends Controller
{
    public function __Construct()
    {
        //Definisi PATH Foto
        $this->path =  'assets/admin/assets/media/derma_gallery';
        //Definisi Dimensi Foto
        $this->dimensions = ['500'];
    }

    public function index()
    {
        $data = Gallery::where('deleted_at', NULL)->get();

		return view('admin.core.gallery.index', compact('data'));
    }

    public function insert()
	{
		$pesan = '';
        $category = Category::where('id_parent', 39)->get();
        
		return view('admin.core.gallery.insert', compact('category', 'pesan'));
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
        $fileName = 'Gallery' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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
            'id_category'   => $request->kategori_produk,
            'is_created'    => \Session::get('id'),
            'embed'         => $request->link,
            'image'         => $fileName
        ];

        $gallery = Gallery::create($data);

        return redirect()->route('gallery.index')->with('success', 'Data Berhasil di Simpan');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $data = $gallery->getFirstMediaUrl('gallery');

        if ($data == NULL) {
            $data = 'public/image/default/placeholder.png';
        }

        $pesan = '';
        $category = Category::where('id_parent', 39)->get();

        return view('admin.core.gallery.edit', compact('data', 'gallery','category', 'pesan'));
    }

    public function update(Request $request, $id)
    {
        if ($request->option == 'image') {
            $embed = NULL;
        } else {
            $embed = $request->link;
        }

        #upload foto to database
        $file = $request->file('image');

        #JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($this->path)) {
            #MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($this->path);
        }

        if ($file) {
            #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
            $fileName = 'Gallery' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();
    
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
            'id_category'   => $request->kategori_produk,
            'is_created'    => \Session::get('id'),
            'embed'         => $embed,
        ];

        if ($file && $embed == NULL)
            $data['image'] = $fileName;
        else if (!$file && $embed != NULL)
            $data['image'] = NULL;

        // dd($data);

        $gallery = Gallery::findOrFail($id);

        if ($file || $embed != NULL) {
            File::delete($this->path.'/'.$gallery->image);
            File::delete($this->path.'/500/'.$gallery->image);
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')->with('info', 'Data Berhasil di Update');
	}
	
	public function delete($id)
	{
		$gallery = Gallery::findOrFail($id);

		$data = [
			'deleted_at'	=> Carbon::now()
		];

		$gallery->update($data);

		return redirect()->route('gallery.index')->with('danger', 'Data Berhasil di Hapus');
	}
}
