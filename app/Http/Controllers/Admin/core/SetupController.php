<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Entities\Admin\core\Menu;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Pages;
use App\Entities\Admin\core\SetupProfile;
use App\Entities\Admin\core\Sejarah;
use App\Entities\Admin\core\Kepengurusan;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Gambar;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Settings;
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

        $desc_iklan = Parameter::where('key', 'desc_iklan')->first();
        $iklan = Parameter::where('key', 'iklan')->first();

        return view('admin.core.setup.settings.index', compact('top_bar', 'pages','kategori_all', 'content_profile', 'youtube', 'content_privacy', 'ketentuan_privacy', 'syarat_ketentuan', 'content_syarat', 'kantor', 'content_kantor', 'facebook', 'instagram', 'twitter','whatsapp','email','content_kontak','desc','desc_iklan','iklan'));
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

        $desc_iklan = Parameter::where('key', 'desc_iklan')->first();
        $desc_iklan->value = $request->deskripsi_iklan;
        $desc_iklan->save();

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

    public function dashboard_customer(Request $request)
    {
        $path = $this->path;
        $benefit_1 = Settings::where('key', 'benefit_1')->first();
        $benefit_2 = Settings::where('key', 'benefit_2')->first();
        $benefit_3 = Settings::where('key', 'benefit_3')->first();
        $benefit_4 = Settings::where('key', 'benefit_4')->first();
        $benefit_5 = Settings::where('key', 'benefit_5')->first();

        $membership_1 = Settings::where('key', 'membership_1')->first();
        $membership_2 = Settings::where('key', 'membership_2')->first();
        $membership_3 = Settings::where('key', 'membership_3')->first();
        $membership_4 = Settings::where('key', 'membership_4')->first();

        $how_to_get_1 = Settings::where('key', 'how_to_get_1')->first();
        $how_to_get_2 = Settings::where('key', 'how_to_get_2')->first();
        $how_to_get_3 = Settings::where('key', 'how_to_get_3')->first();

        $icon_1 = Settings::where('key', 'icon_1')->first();
        $icon_2 = Settings::where('key', 'icon_2')->first();
        $icon_3 = Settings::where('key', 'icon_3')->first();
        $icon_4 = Settings::where('key', 'icon_4')->first();
        $icon_5 = Settings::where('key', 'icon_5')->first(); 
        $icon_6 = Settings::where('key', 'icon_6')->first();

        return view('admin.core.setup.customer.index', compact(
            'path', 'benefit_1', 'benefit_2', 'benefit_3', 'benefit_4', 'benefit_5',
            'membership_1', 'membership_2', 'membership_3', 'membership_4',
            'how_to_get_1', 'how_to_get_2', 'how_to_get_3',
            'icon_1', 'icon_2', 'icon_3', 'icon_4', 'icon_5', 'icon_6',
        ));
    }

    public function store_dashboard(Request $request)
    {
        for ($i=1; $i <= 5; $i++) { 
            $cek = Settings::where('key', 'benefit_'.$i)->first();

            if($cek == null){

                $settings = new Settings;
                $settings->key = 'benefit_'.$i;
                $settings->name = 'benefit '.$i;
                if($request->file('benefit_'.$i) != null){

                    $file = $request->file('benefit_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'benefit'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  

            }else{
                $settings = Settings::where('key', 'benefit_'.$i)->first();
                $settings->key = 'benefit_'.$i;
                $settings->name = 'benefit '.$i;
                if($request->file('benefit_'.$i) != null){

                    $file = $request->file('benefit_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'benefit'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  
            }
        }

        for ($i=1; $i <= 4; $i++) { 
            $cek = Settings::where('key', 'membership_'.$i)->first();

            if($cek == null){

                $settings = new Settings;
                $settings->key = 'membership_'.$i;
                $settings->name = 'membership '.$i;
                if($request->file('membership_'.$i) != null){

                    $file = $request->file('membership_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'membership'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  

            }else{
                $settings = Settings::where('key', 'membership_'.$i)->first();
                $settings->key = 'membership_'.$i;
                $settings->name = 'membership '.$i;
                if($request->file('membership_'.$i) != null){

                    $file = $request->file('membership_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'membership'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  
            }
        }

        for ($i=1; $i <= 3; $i++) { 
            $cek = Settings::where('key', 'how_to_get_'.$i)->first();

            if($cek == null){

                $settings = new Settings;
                $settings->key = 'how_to_get_'.$i;
                $settings->name = 'how to get '.$i;
                if($request->file('how_to_get_'.$i) != null){

                    $file = $request->file('how_to_get_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'how_to_get_'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  

            }else{
                $settings = Settings::where('key', 'how_to_get_'.$i)->first();
                $settings->key = 'how_to_get_'.$i;
                $settings->name = 'how to get '.$i;
                if($request->file('how_to_get_'.$i) != null){

                    $file = $request->file('how_to_get_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'how_to_get_'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  
            }
        }

        for ($i=1; $i <= 6; $i++) { 
            $cek = Settings::where('key', 'icon_'.$i)->first();

            if($cek == null){

                $settings = new Settings;
                $settings->key = 'icon_'.$i;
                $settings->name = 'icon '.$i;
                if($request->file('icon_'.$i) != null){

                    $file = $request->file('icon_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'icon_'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  

            }else{
                $settings = Settings::where('key', 'icon_'.$i)->first();
                $settings->key = 'icon_'.$i;
                $settings->name = 'icon '.$i;
                if($request->file('icon_'.$i) != null){

                    $file = $request->file('icon_'.$i);

                    if (!File::isDirectory($this->path)) {
                        File::makeDirectory($this->path);
                    }

                    $fileName = 'icon_'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    Image::make($file)->save($this->path.'/'. $fileName);
                    $settings->icon = $fileName;
                }
                $settings->save();  
            }
        }

        return redirect()->back();
    }
}
