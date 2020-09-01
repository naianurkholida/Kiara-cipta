<?php

namespace App\Http\Controllers\admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Promo;
use File;

class PromoController extends Controller
{
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

	public function index(Request $request)
	{
		$top_bar = $this->top_bar();

		$validasi = MenuAccess::select('*')
    	->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
    	->where('role_id', \Session::get('role_id'))
    	->where('menus.deleted_at', null)
    	->where('menus.id', 8)
    	->first();

    	$data = Promo::all();

    	return view('admin.core.promo.index', compact('top_bar', 'validasi', 'data'));
	}

	public function insert(Request $request)
	{
		$top_bar = $this->top_bar();

		return view('admin.core.promo.insert', compact('top_bar'));
	}

	public function store(Request $request)
	{
		$file = $request->file('file');

		$cek = $file->getClientOriginalExtension();

		if($cek == 'pdf'){

			$data 	     = new Promo;
			$data->seo   = Str::slug($request->judul);
			$data->judul = $request->judul;
			$data->file  = $file->getClientOriginalName();
			$data->date  = date('Y-m-d');
			$data->save();

			$update = Promo::find($data->id);
			$update->file = $data->id.'_'.$data->seo.'.pdf';
			$update->save();

			$file->move(public_path('promosi'), $update->file);

		}else{
			return redirect('promo/insert')->with('danger', 'Format File Tidak di Dukung!');
		}

		return redirect('promo')->with('success', 'Data Berhasil di Simpan');
	}

	public function edit($id)
	{
		$top_bar = $this->top_bar();
		$data = Promo::find($id);

		return view('admin.core.promo.edit', compact('top_bar', 'data'));
	}

	public function update(Request $request, $id)
	{
		$file = $request->file('file');

		if($file != null){

			$cek = $file->getClientOriginalExtension();

			if($cek == 'pdf'){

				$data 			= Promo::find($id);
				$data->seo 		= Str::slug($request->judul);
				$data->judul 	= $request->judul;
				$data->file 	= $file->getClientOriginalName();
				$data->date     = date('Y-m-d');
				$data->save();

				$update = Promo::find($data->id);
				$update->file = $data->id.'_'.$data->seo.'.pdf';
				$update->save();

				$file->move(public_path('promosi'), $update->file);

				File::delete('promosi/'.$request->file_before);

			}else{
				return redirect('promo/edit/'.$id)->with('danger', 'Format File Tidak di Dukung!');
			}

		}

		return redirect('promo')->with('success', 'Data Berhasil di Hapus');

	}

	public function delete($id)
	{
		Promo::where('id', $id)->delete();

		return redirect()->back()->with('success', 'Data Berhasil di Hapus');
	}
}
