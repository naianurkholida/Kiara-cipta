<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Kepengurusan;
use App\Entities\Admin\core\Sejarah;
use App\Entities\Admin\core\ProfileMizan;
use App\Entities\Admin\core\Language;

use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\MenuAccess as MenuAccess;

class ModulProfileController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $top_bar = $this->top_bar();
        $language = Language::all();

        //dari profile mizan
        $get_definisi = ProfileMizan::where('jenis', "definisi")->get();
        $get_visi = ProfileMizan::where('jenis', "visi")->get();
        $get_misi = ProfileMizan::where('jenis', "misi")->get();
        $legalitas = ProfileMizan::where('jenis', "legalitas")->get();
        
        //dari Kepengurusan
        $dewan_pembina = Kepengurusan::where('jabatan', "dewan pembina")->get();
        $pengawas_syariah = Kepengurusan::where('jabatan', "pangawas syariah")->get();
        $pengawas = Kepengurusan::where('jabatan', "pengawas")->get();
        $direksi = Kepengurusan::where('jabatan', "direksi")->get();

        //sejarah
        $sejarah = Sejarah::orderBy('tahun', 'asc')->get();

        //kepengurusan
        $kepengurusan = Kepengurusan::whereNotIn('jabatan', ['dewan pembina', 'pangawas syariah', 'pengawas', 'direksi'])->get();
        // dd(count($dewan_pembina));
        return view('admin.core.modul_profile.index', compact('top_bar', 'language', 'get_definisi', 'get_visi', 'get_misi', 'legalitas', 'dewan_pembina', 'pengawas_syariah', 'pengawas', 'direksi', 'sejarah', 'kepengurusan'));
    }

    
    public function post(Request $request)
    {
        
        // dd($request->id_visi);

        if($request->trigger == 1){
            foreach($request->definisi as $key => $value){
                if($request->id_definisi[$key] != null){
                    $definisi = new ProfileMizan;
                    $definisi->id_language = $request->id_language[$key];
                    $definisi->jenis = "definisi";
                    $definisi->isi = $request->definisi[0];
                    $definisi->save();
                }else{
                    $definisi = ProfileMizan::where('id', $request->id_definisi[$key])->first();
                    $definisi->id_language = $request->id_language[$key];
                    $definisi->jenis = "definisi";
                    $definisi->isi = $request->definisi[0];
                    $definisi->save();
                }
            }
            
            foreach($request->visi as $key => $value){
                if($request->id_visi[$key] != null){
                    $visi = ProfileMizan::where('id', $request->id_visi[$key])->first();
                    $visi->id_language = $request->id_language_visi[$key];
                    $visi->jenis = "visi";
                    $visi->isi = $request->visi[0];
                    $visi->save();
                }else{
                    $visi = new ProfileMizan;
                    $visi->id_language = $request->id_language_visi[$key];
                    $visi->jenis = "visi";
                    $visi->isi = $request->visi[0];
                    $visi->save();
                }
            }
            
            foreach($request->misi as $key => $value){
                if($request->id_misi[$key] != null){
                    $misi = ProfileMizan::where('id', $request->id_misi)->first();
                    $misi->id_language = $request->id_language_misi[$key];
                    $misi->jenis = "misi";
                    $misi->isi = $request->misi[0];
                    $misi->save();
                }else{
                    $misi = new ProfileMizan;
                    $misi->id_language = $request->id_language_misi[$key];
                    $misi->jenis = "misi";
                    $misi->isi = $request->misi[0];
                    $misi->save();
                }
            }
        }else{
            foreach($request->definisi as $key => $value){
                if($request->id_definisi[$key] != null){
                    $definisi = ProfileMizan::where('id', $request->id_definisi[$key])->first();
                    $definisi->id_language = $request->id_language[$key];
                    $definisi->jenis = "definisi";
                    $definisi->isi = $request->definisi[$key];
                    $definisi->save();
                }else{
                    if($request->definisi[$key] != null){
                        $definisi = new ProfileMizan;
                        $definisi->id_language = $request->id_language[$key];
                        $definisi->jenis = "definisi";
                        $definisi->isi = $request->definisi[$key];
                        $definisi->save();
                    }
                }
            }
            
            foreach($request->visi as $key => $value){
                if($request->id_visi[$key] != null){
                    $visi = ProfileMizan::where('id', $request->id_visi[$key])->first();
                    $visi->id_language = $request->id_language_visi[$key];
                    $visi->jenis = "visi";
                    $visi->isi = $request->visi[$key];
                    $visi->save();
                }else{
                    if($request->visi[$key] != null){
                        $visi = new ProfileMizan;
                        $visi->id_language = $request->id_language_visi[$key];
                        $visi->jenis = "visi";
                        $visi->isi = $request->visi[$key];
                        $visi->save();
                    }
                }
            }
            
            foreach($request->misi as $key => $value){
                if($request->id_misi[$key] != null){
                    $misi = ProfileMizan::where('id', $request->id_misi[$key])->first();
                    $misi->id_language = $request->id_language_misi[$key];
                    $misi->jenis = "misi";
                    $misi->isi = $request->misi[$key];
                    $misi->save();
                }else{
                    if($request->misi[$key] != null){
                        $misi = new ProfileMizan;
                        $misi->id_language = $request->id_language_misi[$key];
                        $misi->jenis = "misi";
                        $misi->isi = $request->misi[$key];
                        $misi->save();
                    }
                }
            }
        }

        foreach($request->legalitas as $key => $value){
            if($request->id_legalitas[$key] != null){
                $legalitas = ProfileMizan::where('id', $request->id_legalitas[$key])->first();
                $legalitas->id_language = 0;
                $legalitas->jenis = "legalitas";
                $legalitas->isi = $request->legalitas[$key];
                $legalitas->save();
            }else{
                if($request->legalitas[$key] != null){
                    $legalitas = new ProfileMizan;
                    $legalitas->id_language = 0;
                    $legalitas->jenis = "legalitas";
                    $legalitas->isi = $request->legalitas[$key];
                    $legalitas->save();
                }
            }
        }

        foreach($request->dewan_pembina as $key => $value){
            if($request->id_dewan_pembina[$key] != null){
                $dewan_pembina = Kepengurusan::where('id', $request->id_dewan_pembina[$key])->first();
                $dewan_pembina->nama = $request->dewan_pembina[$key];
                $dewan_pembina->jabatan = "dewan pembina";
                $dewan_pembina->foto = "";
                $dewan_pembina->save();
            }else{
                if($request->dewan_pembina[$key] != null){
                    $dewan_pembina = new Kepengurusan;
                    $dewan_pembina->nama = $request->dewan_pembina[$key];
                    $dewan_pembina->jabatan = "dewan pembina";
                    $dewan_pembina->foto = "";
                    $dewan_pembina->save();
                }
            }
        }

        foreach($request->pengawas_syariah as $key => $value){
            if($request->id_pengawas_syariah[$key] != null){
                $pengawas_syariah = Kepengurusan::where('id', $request->id_pengawas_syariah[$key])->first();
                $pengawas_syariah->nama = $request->pengawas_syariah[$key];
                $pengawas_syariah->jabatan = "pangawas syariah";
                $pengawas_syariah->foto = "";
                $pengawas_syariah->save();
            }else{
                if($request->pengawas_syariah[$key] != null){
                    $pengawas_syariah = new Kepengurusan;
                    $pengawas_syariah->nama = $request->pengawas_syariah[$key];
                    $pengawas_syariah->jabatan = "pangawas syariah";
                    $pengawas_syariah->foto = "";
                    $pengawas_syariah->save();
                }
            }
        }

        foreach($request->pengawas as $key => $value){
            if($request->id_pengawas[$key] != null){
                $pengawas = Kepengurusan::where('id', $request->id_pengawas[$key])->first();
                $pengawas->nama = $request->pengawas[$key];
                $pengawas->jabatan = "pengawas";
                $pengawas->foto = "";
                $pengawas->save();
            }else{
                if($request->pengawas[$key] != null){
                    $pengawas = new Kepengurusan;
                    $pengawas->nama = $request->pengawas[$key];
                    $pengawas->jabatan = "pengawas";
                    $pengawas->foto = "";
                    $pengawas->save();
                }
            }
        }

        foreach($request->direksi as $key => $value){
            if($request->id_direksi[$key] != null){
                $direksi = Kepengurusan::where('id', $request->id_direksi[$key])->first();
                $direksi->nama = $request->direksi[$key];
                $direksi->jabatan = "direksi";
                $direksi->foto = "";
                $direksi->save();
            }else{
                if($request->direksi[$key] != null){
                    $direksi = new Kepengurusan;
                    $direksi->nama = $request->direksi[$key];
                    $direksi->jabatan = "direksi";
                    $direksi->foto = "";
                    $direksi->save();
                }
            }
        }

        foreach($request->sejarah as $key => $value){
            if($request->id_sejarah[$key] != null){
                $sejarah = Sejarah::where('id', $request->id_sejarah[$key])->first();
                $sejarah->tahun = $request->tahun_sejarah[$key];
                $sejarah->sejarah = $request->sejarah[$key];
                $sejarah->save();
            }else{
                if($request->sejarah[$key] != null){
                    $sejarah = new Sejarah;
                    $sejarah->tahun = $request->tahun_sejarah[$key];
                    $sejarah->sejarah = $request->sejarah[$key];
                    $sejarah->save();
                }
            }
        }

        foreach($request->nama as $key => $value){
            if($request->id_kepengurusan[$key] != null){
                $kepengurusan = Kepengurusan::where('id', $request->id_kepengurusan[$key])->first();
                $kepengurusan->nama = $request->nama[$key];
                $kepengurusan->jabatan = $request->jabatan_management[$key];
                $kepengurusan->foto = "";
                $kepengurusan->save();
            }else{
                if($request->nama[$key] != null){
                    $kepengurusan = new Kepengurusan;
                    $kepengurusan->nama = $request->nama[$key];
                    $kepengurusan->jabatan = $request->jabatan_management[$key];
                    $kepengurusan->foto = "";
                    $kepengurusan->save();
                }
            }
        }

        return redirect('/modul_profile');
    }

    public function delete_misi($id){
        $misi = ProfileMizan::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_legalitas($id){
        $legalitas = ProfileMizan::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_dewan_pembina($id){
        $dewan_pembina = Kepengurusan::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_pengawas_syariah($id){
        $pengawas_syariah = Kepengurusan::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_pengawas($id){
        $pengawas = Kepengurusan::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_direksi($id){
        $direksi = Kepengurusan::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_sejarah($id){
        $sejarah = Sejarah::find($id)->delete();
        
        return redirect('/modul_profile');
    }

    public function delete_kepengurusan($id){
        $kepengurusan = Kepengurusan::find($id)->delete();
        
        return redirect('/modul_profile');
    }
}