<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Menu;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Pages;
use App\Entities\Admin\core\SetupProfile;
use App\Entities\Admin\core\Sejarah;
use App\Entities\Admin\core\Kepengurusan;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Gambar;
use App\Entities\Admin\core\Category;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use DB;
use Image;
use File;

class SetupController extends Controller
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

    public function settings()
    {
        $top_bar = $this->top_bar();
        $pages = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->get();

        $kategori_all= Category::where('id_parent', '=', 0)->get();

        #selected profile
        $profile_parent = Parameter::where('key', 'content_profile')->first();
        $content_profile = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $profile_parent->value)
        ->first();

        #selected kategori program
        $program_parent_kategori = Parameter::where('key', 'kategori_program')->first();
        $kategori_program = Category::where('id', '=', $program_parent_kategori->value)->first();

        #selected youtube
        $youtube = Parameter::where('key', 'video_home')->first();

        #selected zakat
        $zakat_parent = Parameter::where('key', 'content_zakat')->first();
        $content_zakat = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $zakat_parent->value)
        ->first();

        #selected kategori zakat
        $zakat_parent_kategori = Parameter::where('key', 'kategori_zakat')->first();
        $kategori_zakat = Category::where('id', '=', $zakat_parent_kategori->value)->first();

        #selected kisah
        $kisah_parent = Parameter::where('key', 'kisah_sukses')->first();
        $kategori_kisah = Category::where('id', '=', $kisah_parent->value)->first();


        #selected ketentuan dan privacy
        $ketentuan_privacy = Parameter::where('key', 'ketentuan&privacy')->first();
        $content_privacy = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $ketentuan_privacy->value)
        ->first();

        #selected syarat dan ketentuan
        $syarat_ketentuan = Parameter::where('key', 'syarat&ketentuan')->first();
        $content_syarat = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $syarat_ketentuan->value)
        ->first();

        #selected kantor cabang
        $kantor = Parameter::where('key', 'kantor_cabang')->first();
        $content_kantor = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $kantor->value)
        ->first();

        #selected facebook
        $facebook = Parameter::where('key', 'facebook')->first();

        #selected instagram
        $instagram = Parameter::where('key', 'instagram')->first();

        #selected youtube
        $twitter = Parameter::where('key', 'twitter')->first();

        #selected whatsapp
        $whatsapp = Parameter::where('key', 'whatsapp')->first();

        #selected email
        $email = Parameter::where('key', 'email')->first();

        #kebijakan refund
        $kebijakan = Parameter::where('key', 'kebijakan_refund')->first();
        $content_kebijakan = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $kebijakan->value)
        ->first();

        #rekening donasi
        $rekening = Parameter::where('key', 'rekening_donasi')->first();
        $content_rekening = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $rekening->value)
        ->first();

        return view('admin.core.setup.settings.index', compact('top_bar', 'pages','kategori_all', 'content_profile', 'kategori_program', 'youtube', 'content_zakat', 'kategori_zakat', 'kategori_kisah', 'content_privacy', 'ketentuan_privacy', 'syarat_ketentuan', 'content_syarat', 'kantor', 'content_kantor', 'facebook', 'instagram', 'twitter','whatsapp','email','kebijakan','content_kebijakan', 'rekening', 'content_rekening'));
    }

    public function store_settings(Request $request)
    {
        $profile 			= Parameter::where('key', 'content_profile')->first();
        $profile->value 	= $request->content_profile;
        $profile->save();

        $kategori_program           = Parameter::where('key', 'kategori_program')->first();
        $kategori_program->value    = $request->kategori_program;
        $kategori_program->save();

        $video 				= Parameter::where('key', 'video_home')->first();
        $video->value 		= $request->video;
        $video->save();

        $facebook 		 	= Parameter::where('key', 'facebook')->first();
        $facebook->value 	= $request->facebook;
        $facebook->save();

        $instagram 		  	= Parameter::where('key', 'instagram')->first();
        $instagram->value 	= $request->instagram;
        $instagram->save();

        $twwiter 			= Parameter::where('key', 'twitter')->first();
        $twwiter->value 	= $request->twitter;
        $twwiter->save();

        $whatsapp            = Parameter::where('key', 'whatsapp')->first();
        $whatsapp->value     = $request->whatsapp;
        $whatsapp->save();

        $email            = Parameter::where('key', 'email')->first();
        $email->value     = $request->email;
        $email->save();

        $zakat 				= Parameter::where('key', 'content_zakat')->first();
        $zakat->value   	= $request->content_zakat;
        $zakat->save();

        $kategori_zakat 		= Parameter::where('key', 'kategori_zakat')->first();
        $kategori_zakat->value  = $request->kategori_zakat;
        $kategori_zakat->save();

        $kategori_kisah         = Parameter::where('key', 'kisah_sukses')->first();
        $kategori_kisah->value  = $request->kategori_kisah;
        $kategori_kisah->save(); 

        $ketentuan_privacy        = Parameter::where('key', 'ketentuan&privacy')->first();
        $ketentuan_privacy->value = $request->ketentuan_privacy;
        $ketentuan_privacy->save();

        $syarat_ketentuan = Parameter::where('key', 'syarat&ketentuan')->first();
        $syarat_ketentuan->value = $request->syarat_ketentuan;
        $syarat_ketentuan->save();

        $kantor = Parameter::where('key', 'kantor_cabang')->first();
        $kantor->value = $request->kantor_cabang;
        $kantor->save();

        $kebijakan = Parameter::where('key', 'kebijakan_refund')->first();
        $kebijakan->value = $request->kebijakan_refund;
        $kebijakan->save();

        $rekening = Parameter::where('key', 'rekening_donasi')->first();
        $rekening->value = $request->rekening_donasi;
        $rekening->save();

        return redirect()->back();
    }
}
