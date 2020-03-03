<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Gallery;
use Carbon\Carbon;

class GalleryController extends Controller
{
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
        $data = [
            'id_category'   => $request->kategori_produk,
            'is_created'    => \Session::get('id'),
            'embed'         => $request->link
        ];

        $gallery = Gallery::create($data);

        if ($request->option == 'image') {
            if ($request->image != NULL) {
                $gallery->addMedia($request->image)->toMediaCollection('gallery');
            }
        }

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

        $data = [
            'id_category'   => $request->kategori_produk,
            'is_created'    => \Session::get('id'),
            'embed'         => $embed
        ];

        $gallery = Gallery::findOrFail($id);
        $gallery->update($data);

        if ($request->option == 'image') {
            if ($request->image != NULL) {
                if (count($gallery->getMedia('gallery')) > 0) {
                    foreach ($gallery->getMedia('gallery') as $media) {
                        if (!in_array($media->file_name, $request->image)) {
                            $media->delete();
                        }
                    }
                }
    
                $gallery->addMedia($request->image)->toMediaCollection('gallery');
            }
        } else {
            if ($embed != NULL) {
                if (count($gallery->getMedia('gallery')) > 0) {
                    foreach ($gallery->getMedia('gallery') as $media) {
                        $media->delete();
                    }
                }
            }
        } 

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
