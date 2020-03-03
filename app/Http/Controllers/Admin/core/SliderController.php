<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Slider;
use App\Entities\Admin\core\SlideLanguage;
use App\Entities\Admin\core\Language;
use App\Http\Controllers\Controller;
use Image;
use File;

class SliderController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'admin/assets/media/slider';
        //Definisi Dimensi Foto
		$this->dimensions = ['245', '300', '500'];
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

    	if(\Session::get('role_id') == '1'){
    		$slider = Slider::select('slider.*', 'slider_language.id as id_slider_lg','slider_language.judul','slider_language.deskripsi')
    		->join('slider_language', 'slider_language.slider_id', 'slider.id')
    		->where('status', 1)
    		->where('slider_language.id_language', 1)
    		->get();
    	}else{
    		$slider = Slider::select('slider.*', 'slider_language.id as id_slider_lg','slider_language.judul','slider_language.deskripsi')
    		->join('slider_language', 'slider_language.slider_id', 'slider.id')
    		->where('status', 1)
    		->where('slider_language.id_language', 1)
    		->where('slider.is_created', \Session::get('id'))
    		->get();
    	}

    	return view('admin.core.slider.index', compact('top_bar', 'slider'));
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
    	return view('admin.core.slider.insert', compact('top_bar','language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$slider = new Slider;
    	$slider->title_button = $request->title_button;
    	$slider->link = $request->link;
    	$slider->status = 1;
    	$slider->is_created = \Session::get('id');
		$slider->save();
		
		if ($request->image != NULL) {
            $slider->addMedia($request->image)->toMediaCollection('slider');
        }

    	if($request->trigger == 1){
    		foreach ($request->judul as $key => $value) {
    			$slider_language = new SlideLanguage;
    			$slider_language->slider_id = $slider->id;
    			$slider_language->id_language = $request->language[$key];
    			$slider_language->judul       = $request->judul[0];
    			$slider_language->deskripsi   = $request->deskripsi[0];
    			$slider_language->save();
    		}
    	}else{
    		foreach ($request->judul as $key => $value) {
    			if($request->judul[$key] != null){
    				$slider_language = new SlideLanguage;
    				$slider_language->slider_id = $slider->id;
    				$slider_language->id_language = $request->language[$key];
    				$slider_language->judul     = $request->judul[$key];
    				$slider_language->deskripsi = $request->deskripsi[$key];
    				$slider_language->save();
    			}
    		}
    	}

    	return redirect('/slider')->with('success', 'Data Berhasil di Simpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    	$slider = Slider::find($id);
		$slider_language = SlideLanguage::where('slider_id', $id)->get();
		
		$data = $slider->getFirstMediaUrl('slider');

    	return view('admin.core.slider.edit', compact('top_bar', 'slider', 'language', 'slider_language', 'data'));
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
    	$slider = Slider::find($id);
    	$slider->title_button = $request->title_button;
    	$slider->link = $request->link;
    	$slider->status = 1;
    	$slider->is_created = \Session::get('id');
		$slider->save();
		
		if ($request->image != NULL) {
            $media = $slider->getFirstMedia('slider');

            if ($media != NULL) {
                $media->delete();
            }

            $slider->addMedia($request->image)->toMediaCollection('slider');
        }

    	if($request->trigger == 1){
    		foreach ($request->judul as $key => $value) {
    			$ceker = SlideLanguage::where('id_language', $request->language[$key])->where('slider_id', $id)->count();
    			if($ceker == 1){
    				$slider_language = SlideLanguage::where('id', $request->idl[$key])->first();
    				$slider_language->slider_id   = $slider->id;
    				$slider_language->id_language = $request->language[$key];
    				$slider_language->judul       = $request->judul[0];
    				$slider_language->deskripsi   = $request->deskripsi[0];
    				$slider_language->save();
    			}else{
    				$slider_language = new SlideLanguage;
    				$slider_language->slider_id   = $slider->id;
    				$slider_language->id_language = $request->language[$key];
    				$slider_language->judul       = $request->judul[0];
    				$slider_language->deskripsi   = $request->deskripsi[0];
    				$slider_language->save();
    			}
    		}
    	}else{
    		foreach ($request->judul as $key => $value) {
    			if($request->judul[$key] != null){
    				$ceker = SlideLanguage::where('id_language', $request->language[$key])->where('slider_id', $id)->count();
    				if($ceker == 1){
    					$slider_language = SlideLanguage::where('id', $request->idl[$key])->first();
    					$slider_language->slider_id = $slider->id;
    					$slider_language->id_language = $request->language[$key];
    					$slider_language->judul       = $request->judul[$key];
    					$slider_language->deskripsi   = $request->deskripsi[$key];
    					$slider_language->save();
    				}else{
    					$slider_language = new SlideLanguage;
    					$slider_language->slider_id = $slider->id;
    					$slider_language->id_language = $request->language[$key];
    					$slider_language->judul       = $request->judul[$key];
    					$slider_language->deskripsi   = $request->deskripsi[$key];
    					$slider_language->save();
    				}
    			}
    		}
    	}

    	return redirect('/slider')->with('info', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    	$slider = Slider::find($id);
    	$slider->status = 0;
		$slider->save();
		
		$media = $slider->getFirstMedia('slider');

        if ($media != NULL) {
            $media->delete();
		}

    	return redirect('/slider')->with('danger', 'Data Berhasil di Hapus');
    }
}