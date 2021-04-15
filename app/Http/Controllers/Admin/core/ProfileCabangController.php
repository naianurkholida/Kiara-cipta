<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Entities\Admin\core\ProfileCabang;
use App\Entities\Admin\core\ProfileCabangDetail;

class ProfileCabangController extends Controller
{
    public function index () 
    {
        $data = ProfileCabang::where('deleted_at', NULL)->get();

        return view('admin.core.profile_cabang.index', compact('data'));
    }

    public function insert () 
    {
        return view('admin.core.profile_cabang.insert');
    }

    public function store (Request $req) 
    {
        $cabang = ProfileCabang::create([
            'name' => $req->pc_name,
            'is_active' => $req->pc_status,
            'address' => $req->pc_address,
            'link' => $req->pc_link,
        ]);

        foreach ($req->pc_detail_type as $key => $value) {
            $cabang_detail = ProfileCabangDetail::create([
                'id_profile_cabang' => $cabang->id,
                'type' => $req->pc_detail_type[$key],
                'value' => $req->pc_detail_value[$key],
            ]);
        }

        return redirect()->route('profile_cabang.index')->with('info', 'Data Berhasil disimpan!');
    }

    public function edit ($id) 
    {
        $data = ProfileCabang::with('detail')->find($id);

        return view('admin.core.profile_cabang.edit', compact('data'));
    }

    public function update (Request $req, $id) 
    {
        return redirect()->route('profile_cabang.index')->with('info', 'Data Berhasil diubah!');
    }

    public function delete ($id) 
    {
        return redirect()->route('profile_cabang.index')->with('danger', 'Data Berhasil dihapus!');
    }
}
