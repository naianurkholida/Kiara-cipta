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
    public function __construct()
    {
        $this->path =  'assets/admin/assets/media/img';
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

        #selected youtube
        $youtube = Parameter::where('key', 'video_home')->first();

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

        #selected kontak
        $kontak = Parameter::where('key', 'kontak')->first();
        $content_kontak = Pages::select('pages.id as key_page','pages_language.*')
        ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
        ->where('pages_language.id_language', 1)
        ->where('pages.id', $kontak->value)
        ->first();

        #selected desc
        $desc = Parameter::where('key', 'deskripsi_home')->first();

        $iklan = Parameter::where('key', 'iklan')->first();

        return view('admin.core.setup.settings.index', compact('top_bar', 'pages','kategori_all', 'content_profile', 'youtube', 'content_privacy', 'ketentuan_privacy', 'syarat_ketentuan', 'content_syarat', 'kantor', 'content_kantor', 'facebook', 'instagram', 'twitter','whatsapp','email','content_kontak','desc','iklan'));
    }

    public function store_settings(Request $request)
    {
        $profile 			= Parameter::where('key', 'content_profile')->first();
        $profile->value 	= $request->content_profile;
        $profile->save();

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

        $ketentuan_privacy        = Parameter::where('key', 'ketentuan&privacy')->first();
        $ketentuan_privacy->value = $request->ketentuan_privacy;
        $ketentuan_privacy->save();

        $syarat_ketentuan = Parameter::where('key', 'syarat&ketentuan')->first();
        $syarat_ketentuan->value = $request->syarat_ketentuan;
        $syarat_ketentuan->save();

        $kantor = Parameter::where('key', 'kantor_cabang')->first();
        $kantor->value = $request->kantor_cabang;
        $kantor->save();

        $kontak = Parameter::where('key', 'kontak')->first();
        $kontak->value = $request->kontak;
        $kontak->save();

        $desc = Parameter::where('key', 'deskripsi_home')->first();
        $desc->value = $request->desc;
        $desc->save();

        if($request->file('iklan') != null){
            $iklan = Parameter::where('key', 'iklan')->first();
            $file = $request->file('iklan');

            if (!File::isDirectory($this->path)) {
                File::makeDirectory($this->path);
            }

            $fileName = 'Iklan'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->save($this->path.'/'. $fileName);
            $iklan->value = $fileName;
            $iklan->save();
        }

        return redirect()->back();
    }
}
