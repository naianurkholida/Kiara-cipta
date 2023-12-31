<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Entities\Admin\core\Pages;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\PagesLanguage;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;

class PagesController extends Controller
{
    public function __construct()
    {
        //Definisi PATH Foto
        $this->path =  'assets/admin/assets/media/pages';
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

        if(\Session::get('role_id') == '1'){
            $pages = DB::table('pages')
            ->join('category', 'category.id', '=', 'pages.id_category')
            ->join('pages_language', 'pages.id', '=', 'pages_language.id_pages')
            ->where('pages_language.id_language', 1)
            ->get();
        }else{
            $pages = DB::table('pages')
            ->join('category', 'category.id', '=', 'pages.id_category')
            ->join('pages_language', 'pages.id', '=', 'pages_language.id_pages')
            ->where('pages_language.id_language', 1)
            ->where('pages.is_created', \Session::get('id'))
            ->get();
        }

        $validasi = MenuAccess::select('*')
        ->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
        ->where('role_id', \Session::get('role_id'))
        ->where('menus.deleted_at', null)
        ->where('menus.id', 10)
        ->first();

        return view('admin.core.pages.index', compact('top_bar', 'pages', 'validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $top_bar = $this->top_bar();
        $category = Category::where('id_parent', 0)->get();
        $language = Language::all();
        return view('admin.core.pages.insert', compact('top_bar', 'category', 'language'));
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

        $fileName = '';
        if($file != NULL) {
            #JIKA FOLDERNYA BELUM ADA
            if (!File::isDirectory($this->path)) {
                #MAKA FOLDER TERSEBUT AKAN DIBUAT
                File::makeDirectory($this->path);
            }

            #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
            $fileName = Str::slug($request->judul[0]). '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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

        $pages = new Pages;
        $pages->image = $fileName;
        $pages->id_category = $request->kategori;
        $pages->is_created  = \Session::get('id');
        $pages->save();

        if($request->trigger == 1){
            foreach ($request->language as $key => $value) {
                $pagelang = new PagesLanguage;
                $pagelang->id_language = $request->language[$key];
                $pagelang->id_pages = $pages->id;
                $pagelang->judul_page = $request->judul[0];
                $pagelang->konten_page = $request->content[0];
                $pagelang->save();
            }
        }else{
            foreach ($request->language as $key => $value) {
                if($request->judul[$key] != null){
                    $pagelang = new PagesLanguage;
                    $pagelang->id_language = $request->language[$key];
                    $pagelang->id_pages = $pages->id;
                    $pagelang->judul_page = $request->judul[$key];
                    $pagelang->konten_page = $request->content[$key];
                    $pagelang->save();
                }
            }
        }        

        return redirect('pages')->with('success', 'Data Berhasil di Simpan');
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
        $category = Category::where('id_parent', 0)->get();
        $language = Language::all();
        $pages = Pages::find($id);
        $pageslang = PagesLanguage::where('id_pages', $id)->get();
        // dd($pageslang);
        return view('admin.core.pages.edit', compact('top_bar', 'category', 'language', 'pages', 'pageslang'));
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

        $fileName = '';
        if($file != NULL) {
            #JIKA FOLDERNYA BELUM ADA
            if (!File::isDirectory($this->path)) {
                #MAKA FOLDER TERSEBUT AKAN DIBUAT
                File::makeDirectory($this->path);
            }

            #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
            $fileName = Str::slug($request->judul[0]). '_' .date('Ymdhis'). '.' . $file->getClientOriginalExtension();

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

        $pages = Pages::find($id);
        if($fileName != ''){
            $pages->image = $fileName;
        }

        $pages->id_category = $request->kategori;
        $pages->is_created  = \Session::get('id');
        $pages->save();

        if($request->trigger == 1){
            foreach($request->judul as $key => $value){
                $ceker = PagesLanguage::where('id_language', $request->language[$key])->where('id_pages', $id)->count();
                if($ceker == 1){
                    $language = PagesLanguage::where('id', $request->idl[$key])->first();
                    $language->id_pages = $pages->id;
                    $language->id_language = $request->language[$key];
                    $language->judul_page = $request->judul[0];
                    $language->konten_page = $request->content[0];
                    $language->save();
                }else{
                    $language = new PagesLanguage;
                    $language->id_pages = $pages->id;
                    $language->id_language = $request->language[$key];
                    $language->judul_page = $request->judul[0];
                    $language->konten_page = $request->content[0];
                    $language->save();
                }
            }
        }else{
            foreach($request->judul as $key => $value){
                if($request->judul[$key] != null){
                    $ceker = PagesLanguage::where('id_language', $request->language[$key])->where('id_pages', $id)->count();
                    if($ceker == 1){
                        $language = PagesLanguage::where('id', $request->idl[$key])->first();
                        $language->id_pages = $pages->id;
                        $language->id_language = $request->language[$key];
                        $language->judul_page = $request->judul[$key];
                        $language->konten_page = $request->content[$key];
                        $language->save();
                    }else{
                        $language = new PagesLanguage;
                        $language->id_pages = $pages->id;
                        $language->id_language = $request->language[$key];
                        $language->judul_page = $request->judul[$key];
                        $language->konten_page = $request->content[$key];
                        $language->save();
                    }
                }
            }
        }

        return redirect('pages')->with('info', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pages::where('id', $id)->delete();
        PagesLanguage::where('id_pages', $id)->delete();

        return redirect('pages')->with('danger', 'Data Berhasil di Hapus');
    }
}
