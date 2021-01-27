<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\PostingLanguage;
use App\Entities\Admin\core\PostingRelated;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Http\Controllers\Controller;
use DB;
use Image;
use File;

class PostingController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/posting';
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
        	$posting = DB::table('posting')
        	->select('posting.*', 'posting_language.judul', 'posting_language.content', 'category.category')
        	->join('category', 'category.id', '=', 'posting.id_category')
        	->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')
        	->where('posting_language.id_language', 1)
        	->orderBy('created_at', 'desc')
        	->get();
        }else{
        	$posting = DB::table('posting')
        	->select('posting.*', 'posting_language.judul', 'posting_language.content', 'category.category')
        	->join('category', 'category.id', '=', 'posting.id_category')
        	->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')
        	->where('posting_language.id_language', 1)
        	->where('posting.is_created', \Session::get('id'))
        	->orderBy('created_at', 'desc')
        	->get();
        }

    	$validasi = MenuAccess::select('*')
    	->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
    	->where('role_id', \Session::get('role_id'))
    	->where('menus.deleted_at', null)
    	->where('menus.id', 9)
    	->first();
    	return view('admin.core.posting.index', compact('top_bar', 'posting', 'validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$top_bar = $this->top_bar();
    	$category = Category::where('id_parent', 4)->get();
    	$language = Language::all();
    	$posting = PostingLanguage::where('id_language', 1)->get();
    	return view('admin.core.posting.insert', compact('top_bar', 'category', 'language', 'posting'));
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

    	$idpr = explode(',', $request->id_posting_related);

    	$posting = new Posting;
    	$posting->id_category = $request->kategori;
    	$posting->status = 1;
    	$posting->is_created = \Session::get('id');
        $posting->image = $fileName;
		$posting->save();
		
    	if($request->trigger == 1){
    		foreach($request->judul as $key => $value){
    			$language = new PostingLanguage;
    			$language->seo         = Str::slug($request->judul[0]);
    			$language->id_posting  = $posting->id;
    			$language->id_language = $request->language[$key];
    			$language->judul       = $request->judul[0];
    			$language->content     = $request->content[0];
    			$language->save();
    		}
    	}else{
    		foreach($request->judul as $key => $value){
    			if($request->judul[$key] != null){
    				$language = new PostingLanguage;
    				$language->seo          = Str::slug($request->judul[$key]);
    				$language->id_posting   = $posting->id;
    				$language->id_language  = $request->language[$key];
    				$language->judul        = $request->judul[$key];
    				$language->content      = $request->content[$key];
    				$language->save();
    			}
    		}
    	}

    	if(count($idpr) > 1){
    		foreach($idpr as $key => $value){
    			$id_pr = new PostingRelated;
    			$id_pr->id_posting = $posting->id;
    			$id_pr->id_sub_posting = $idpr[$key];
    			$id_pr->save();
    		}
    	}

    	return redirect('posting')->with('success', 'Data Berhasil di Simpan');
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
    	$category = Category::where('id_parent', 4)->get();
    	$posting = Posting::find($id);
    	$language = Language::all();
		$postingl = PostingLanguage::where('id_posting', $id)->get();
		
		$data = $posting->getFirstMediaUrl('posting');

    	return view('admin.core.posting.edit', compact('top_bar', 'category', 'posting', 'language', 'postingl', 'data'));
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

    	$posting = Posting::find($id);

        File::delete($this->path.'/'.$posting->image);
        File::delete($this->path.'/500/'.$posting->image);

    	$posting->id_category = $request->kategori;
    	$posting->status = $request->status;
        $posting->image = $fileName;
    	$posting->is_created = \Session::get('id');
		$posting->save();

    	if($request->trigger == 1){
    		foreach($request->judul as $key => $value){
    			$ceker = PostingLanguage::where('id_language', $request->language[$key])->where('id_posting', $id)->count();
    			if($ceker == 1){
    				$language = PostingLanguage::where('id', $request->idl[$key])->first();
    				$language->seo         = Str::slug($request->judul[0]);  
    				$language->id_posting  = $posting->id;
    				$language->id_language = $request->language[$key];
    				$language->judul       = $request->judul[0];
    				$language->content     = $request->content[0];
    				$language->save();
    			}else{
    				$language = new PostingLanguage;
    				$language->seo          = Str::slug($request->judul[0]);  
    				$language->id_posting   = $posting->id;
    				$language->id_language  = $request->language[$key];
    				$language->judul        = $request->judul[0];
    				$language->content      = $request->content[0];
    				$language->save();
    			}
    		}
    	}else{
    		foreach($request->judul as $key => $value){
    			if($request->judul[$key] != null){
    				$ceker = PostingLanguage::where('id_language', $request->language[$key])->where('id_posting', $id)->count();
    				if($ceker == 1){
    					$language = PostingLanguage::where('id', $request->idl[$key])->first();
    					$language->seo         = Str::slug($request->judul[$key]);  
    					$language->id_posting  = $posting->id;
    					$language->id_language = $request->language[$key];
    					$language->judul       = $request->judul[$key];
    					$language->content     = $request->content[$key];
    					$language->save();
    				}else{
    					$language = new PostingLanguage;
    					$language->seo         = Str::slug($request->judul[$key]);  
    					$language->id_posting = $posting->id;
    					$language->id_language = $request->language[$key];
    					$language->judul = $request->judul[$key];
    					$language->content = $request->content[$key];
    					$language->save();
    				}
    			}
    		}
    	}

    	return redirect('posting')->with('info', 'Data Berhasil di Update');
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
    	$posting = Posting::where('id', $id)->first();

    	Posting::where('id', $id)->delete();
    	PostingLanguage::where('id_posting', $id)->delete();

		$media = $posting->getFirstMedia('posting');

        if ($media != NULL) {
            $media->delete();
		}
			
    	return redirect('posting')->with('danger', 'Data Berhasil di Hapus');
    }
}
