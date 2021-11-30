<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Sosmed;
use Carbon\Carbon;

class SosmedController extends Controller
{
    public function index()
    {
        $data = Sosmed::where('deleted_at', NULL)->get();

		return view('admin.core.sosmed.index', compact('data'));
    }

    public function insert()
	{
		$pesan = '';
        $category = Category::where('id_parent', 52)->get();
        
		return view('admin.core.sosmed.insert', compact('category', 'pesan'));
    }

    public function store(Request $request)
    {
        $data = [
            'id_category'   => $request->kategori_sosmed,
            'is_created'    => \Session::get('id'),
            'link'         => $request->link
        ];

        $sosmed = Sosmed::create($data);

        return redirect()->route('sosmed.index')->with('success', 'Data Berhasil di Simpan');
    }

    public function edit($id)
    {
        $sosmed = Sosmed::findOrFail($id);

        $pesan = '';
        $category = Category::where('id_parent', 52)->get();

        return view('admin.core.sosmed.edit', compact('sosmed','category', 'pesan'));
    }

    public function update(Request $request, $id)
    {
        if ($request->option == 'image') {
            $link = NULL;
        } else {
            $link = $request->link;
        }

        $data = [
            'id_category'   => $request->kategori_sosmed,
            'is_created'    => \Session::get('id'),
            'link'         => $link
        ];

        $sosmed = Sosmed::findOrFail($id);
        $sosmed->update($data);

        return redirect()->route('sosmed.index')->with('info', 'Data Berhasil di Update');
	}
	
	public function delete($id)
	{
		$sosmed = Sosmed::findOrFail($id);

		$data = [
			'deleted_at'	=> Carbon::now()
		];

		$sosmed->update($data);

		return redirect()->route('sosmed.index')->with('danger', 'Data Berhasil di Hapus');
	}
}
