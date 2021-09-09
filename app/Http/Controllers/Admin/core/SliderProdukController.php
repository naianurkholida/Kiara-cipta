<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\SliderProduk;
use App\Entities\Admin\core\SliderProdukLanguage;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Category;
use App\Http\Controllers\Controller;
use Image;
use File;
use DB;

class SliderProdukController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/slider';
        //Definisi Dimensi Foto
		$this->dimensions = ['500'];
	}

	public function top_bar()
	{
		$data['menu_item'] = MenuAccess::select('*')
		->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
		->where('role_id', \Session::get('role_id'))
		->where('menus.parent_id', '0')
		->where('menus.deleted_at', null)
		->orderBy('order_num','ASC')
		->get();

		$data['setting']   = MenuAccess::select('*')
		->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
		->where('role_id', \Session::get('role_id'))
		->where('menus.parent_id', '!=', 0)
		->where('menus.deleted_at', null)
		->orderBy('order_num','ASC')
		->get();

		return $data;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$top_bar = $this->top_bar();
    	
    	$slider = SliderProduk::with('descriptionJoin')
    	->whereHas('descriptionJoin', function($q){
    		$q->where('id_language', 1);
    	})->orderBy('order_num', 'asc')->get();

    	return view('admin.core.slider.produk.index', compact('top_bar', 'slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$top_bar = $this->top_bar();
    	$language = language::all();
    	$category = Category::where('id_parent', 36)->get();

    	return view('admin.core.slider.produk.insert', compact('top_bar','language','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
		$fileName = 'Slider' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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

    	$slider = new SliderProduk;
    	$slider->category_id = $request->kategori_produk;
    	$slider->seo = \Str::slug($request->judul[0]);
    	$slider->banner = $fileName;
    	$slider->order_num = $request->order_num;
    	$slider->save();

    	if($request->trigger == 1){
    		foreach ($request->judul as $key => $value) {
    			$slider_language = new SliderProdukLanguage;
    			$slider_language->id_slider_produk = $slider->id;
    			$slider_language->id_language = $request->language[$key];
    			$slider_language->title       = $request->judul[0];
    			$slider_language->desc   = $request->deskripsi[0];
    			$slider_language->save();
    		}
    	}else{
    		foreach ($request->judul as $key => $value) {
    			if($request->judul[$key] != null){
    				$slider_language = new SliderProdukLanguage;
    				$slider_language->id_slider_produk = $slider->id;
    				$slider_language->id_language = $request->language[$key];
    				$slider_language->title     = $request->judul[$key];
    				$slider_language->desc = $request->deskripsi[$key];
    				$slider_language->save();
    			}
    		}
    	}

    	return redirect('/slider/produk')->with('success', 'Data Berhasil di Simpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($seo)
    {
        //for frontpage

        $data = SliderProduk::with('descriptionJoin')->where('seo', $seo)->first();

        return view('frontend.slider_produk', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$top_bar = $this->top_bar();
    	$language = Language::all();
    	$slider = SliderProduk::find($id);
    	$slider_language = SliderProdukLanguage::where('id_slider_produk', $id)->get();
    	$category = Category::where('id_parent', 36)->get();

    	return view('admin.core.slider.produk.edit', compact('top_bar', 'slider', 'language', 'slider_language', 'category'));
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
    	#upload foto to database
		$file = $request->file('image');
        
        if($file){
	        #JIKA FOLDERNYA BELUM ADA
			if (!File::isDirectory($this->path)) {
	            #MAKA FOLDER TERSEBUT AKAN DIBUAT
				File::makeDirectory($this->path);
			}

	        #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
			$fileName = 'Slider' . '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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

		$slider = SliderProduk::find($id);

		if($file){
			File::delete($this->path.'/'.$slider->banner);
    		File::delete($this->path.'/500/'.$slider->banner);
		}

    	$slider->category_id = $request->kategori_produk;
    	$slider->seo = \Str::slug($request->judul[0]);
    	if($file){
    		$slider->banner = $fileName;
    	}
    	$slider->order_num = $request->order_num;
    	$slider->save();

    	if($request->trigger == 1){
    		foreach ($request->judul as $key => $value) {
    			$ceker = SliderProdukLanguage::where('id_language', $request->language[$key])->where('id_slider_produk', $id)->count();
    			if($ceker == 1){
    				$slider_language = SliderProdukLanguage::where('id', $request->idl[$key])->first();
    				$slider_language->id_slider_produk   = $slider->id;
    				$slider_language->id_language = $request->language[$key];
    				$slider_language->title       = $request->judul[0];
    				$slider_language->desc   = $request->deskripsi[0];
    				$slider_language->save();
    			}else{
    				$slider_language = new SliderProdukLanguage;
    				$slider_language->id_slider_produk   = $slider->id;
    				$slider_language->id_language = $request->language[$key];
    				$slider_language->title       = $request->judul[0];
    				$slider_language->desc   = $request->deskripsi[0];
    				$slider_language->save();
    			}
    		}
    	}else{
    		foreach ($request->judul as $key => $value) {
    			if($request->judul[$key] != null){
    				$ceker = SliderProdukLanguage::where('id_language', $request->language[$key])->where('id_slider_produk', $id)->count();
    				if($ceker == 1){
    					$slider_language = SliderProdukLanguage::where('id', $request->idl[$key])->first();
    					$slider_language->id_slider_produk = $slider->id;
    					$slider_language->id_language = $request->language[$key];
    					$slider_language->title       = $request->judul[$key];
    					$slider_language->desc   = $request->deskripsi[$key];
    					$slider_language->save();
    				}else{
    					$slider_language = new SliderProdukLanguage;
    					$slider_language->id_slider_produk = $slider->id;
    					$slider_language->id_language = $request->language[$key];
    					$slider_language->title       = $request->judul[$key];
    					$slider_language->desc   = $request->deskripsi[$key];
    					$slider_language->save();
    				}
    			}
    		}
    	}

    	return redirect('/slider/produk')->with('info', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	$slider = SliderProduk::find($id);

    	File::delete($this->path.'/'.$slider->banner);
    	File::delete($this->path.'/500/'.$slider->banner);

    	$slider->delete();

    	return redirect('/slider/produk')->with('danger', 'Data Berhasil di Hapus');
    }
}