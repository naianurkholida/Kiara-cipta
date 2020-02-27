<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;

class LanguageController extends Controller
{
    public function __construct()
	{
        //
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Language::all();
        
    	return view('admin.core.language.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.core.language.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $language = new Language;
    	$language->judul_language = $request->language;
    	$language->code = $request->code;
        $language->save();
        
        if ($request->image != NULL) {
            $language->addMedia($request->image)->toMediaCollection('language');
        }

    	return redirect('language');
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
    	$language = Language::findOrFail($id);
		
		$data = $language->getFirstMediaUrl('language');

    	return view('admin.core.language.edit', compact('language', 'data'));
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
    	$language = Language::findOrFail($id);
    	$language->judul_language = $request->language;
    	$language->code = $request->code;
		$language->save();
		
		if ($request->image != NULL) {
            $media = $language->getFirstMedia('language');

            if ($media != NULL) {
                $media->delete();
            }

            $language->addMedia($request->image)->toMediaCollection('language');
        }

    	return redirect('language');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        #Hapus Folder
    	$language = Language::findOrFail($id);

		$media = $language->getFirstMedia('language');

        if ($media != NULL) {
            $media->delete();
        }
        
        $language->delete();
			
    	return redirect('language');
    }
}
