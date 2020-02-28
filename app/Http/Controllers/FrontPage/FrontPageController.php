<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email\EmailRegisterVerify;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\PostingLanguage;
use App\Entities\Admin\core\Pages;
use App\Entities\Admin\core\Theme;
use App\Entities\Admin\core\User;
use App\Entities\Admin\core\ProfileMizan;
use App\Entities\Admin\modul\Zakat;
use App\Entities\Admin\modul\ZakatDetail;
use App\Entities\Admin\core\Program;
use App\Entities\Admin\modul\Donasi;
use App\Entities\Admin\modul\DonasiDetail;
use App\Entities\Admin\core\InfoTerbaru;
use App\Entities\Admin\core\InfoTerbaruDetail;
use App\Entities\Admin\modul\Guest;
use App\Entities\Admin\core\Slider;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Kepengurusan;
use App\Entities\FrontPage\Comments;
use App\Entities\FrontPage\EmailVerify;
use App\Entities\FrontPage\ForgotPassword;
use App\Entities\Admin\core\Sejarah;
use DB;
use File;
use Image;


class FrontPageController extends Controller
{
	private $header;
	private $footer;
	private $posting;
	private $theme;

	public function __construct()
	{
        //for foto
        //Definisi PATH Foto
		$this->path =  'admin/assets/media/foto-users';
        //Definisi Dimensi Foto
		$this->dimensions = ['245', '300', '500'];
        //end foto

		if(\App::getLocale() == "id"){
			$id_lang = 1;
		}else{
			$id_lang = 2;
		}

		$this->language = $id_lang;

		$this->header = MenuFrontPage::join('menu_front_page_language', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')->join('category', 'menu_front_page.id_category', '=', 'category.id')->where('category.category', "Menu Header")->where('menu_front_page.id_sub_menu', 0)->where('menu_front_page_language.id_language', $id_lang)->orderBy('menu_front_page.sort_order', 'asc')->get();

		$this->footer = MenuFrontPage::join('menu_front_page_language', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')->join('category', 'menu_front_page.id_category', '=', 'category.id')->where('category.category', "Menu Footer")->where('menu_front_page.id_sub_menu', 0)->where('menu_front_page_language.id_language', $id_lang)->orderBy('menu_front_page.sort_order', 'asc')->get();

		$this->posting = Posting::select('posting.*', 'posting_language.id_posting', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'posting_language.seo', 'category.category')->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')->join('category', 'category.id', '=', 'posting.id_category')->where('posting_language.id_language', $id_lang)->where('category.category', "Artikel")->where('posting.status', '=', '1')->orderBy('posting.created_at', 'desc')->paginate(6);

		$this->theme = Theme::where('status', 1)->first();
        // dd(Session::all());
		if(Session::has('locale')){
			\App::setLocale(Session::get('locale'));
		}
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	// \App::setLocale(Session::get('locale'));

    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$link = Parameter::where('key', 'video_home')->first();
    	$links = str_replace("https://www.youtube.com/watch?v=", '', $link->value);

    	$posting = Posting::select('posting.*', 'posting_language.id_posting', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'posting_language.seo', 'category.category')
    	->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')
    	->join('category', 'category.id', '=', 'posting.id_category')
    	->where('posting_language.id_language', $id_lang)
    	->where('category.category', "Artikel")
    	->where('posting.status', '1')
    	->orderBy('created_at', 'desc')
    	->limit(4)
    	->get();

    	$parent_kategori = Parameter::where('key', 'kategori_program')->first();

    	$category = Category::select('category.*','gambar.gambar')
    	->leftjoin('gambar', 'gambar.id_relasi', '=', 'category.id')
    	->where('category.id_parent', $parent_kategori->value)
    	->orderBy('category.order_num', 'asc')
    	->get();

    	$parent_kisah = Parameter::where('key', 'kisah_sukses')->first();

    	$kisah_sukses = Posting::select('posting.*', 'posting_language.id_posting', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'posting_language.seo', 'category.category')
    	->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')
    	->join('category', 'category.id', '=', 'posting.id_category')
    	->where('posting_language.id_language', $id_lang)
    	->where('category.id', $parent_kisah->value)
    	->where('posting.status', '1')
    	->orderBy('created_at', 'desc')
    	->get();

    	$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    	->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->leftjoin('category', 'category.id', '=', 'program.id_category')
    	->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    	->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    	->groupBy('program.id')
    	->get();

    	$program_home = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    	->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->leftjoin('category', 'category.id', '=', 'program.id_category')
    	->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    	->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    	->groupBy('program.id')
    	->get();

    	$slider = Slider::select('slider.*', 'slider_language.id as id_slider_lg','slider_language.judul','slider_language.deskripsi')
    	->join('slider_language', 'slider_language.slider_id', 'slider.id')
    	->where('status', 1)
    	->where('slider_language.id_language', $id_lang)
    	->get();

    	$footer_text = Parameter::where('key', $id_lang)->first();

        $facebook = Parameter::where('key', 'facebook')->first();

    	return view('front_page.'.$this->theme->key.'.main_layouts.index', compact(
    		'header', 
    		'footer', 
    		'posting', 
    		'category',
    		'kisah_sukses',
    		'program',
    		'slider',
    		'links',
    		'program_home',
    		'footer_text',
    		'language',
            'facebook'
    	));
    }

    public function cari(Request $request)
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$cari  = $request->search_query_first;
    	$cate = $request->search_query_last;

    	$parent_kategori = Parameter::where('key', 'kategori_program')->first();

    	$category_program = Category::select('*')
    	->where('category.id_parent', $parent_kategori->value)
    	->orderBy('category.order_num', 'asc')
    	->get();

    	if($cate == "all" && $cari == null){
    		$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category')
    		->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    		->leftjoin('category', 'category.id', '=', 'program.id_category')
    		->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    		->where('program.deleted_at', null)
    		->where('programlanguage.id_language', $id_lang)
    		->groupby('program.id')
    		->paginate(9);

    		$program->appends($request->only('search_query_first','search_query_last'));
    	}else if($cate != "all" && $cari == null){
    		$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    		->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    		->leftjoin('category', 'category.id', '=', 'program.id_category')
    		->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    		->where('program.deleted_at', null)
    		->where('category.id', 'like', '%'.$cate.'%')
    		->where('programlanguage.id_language', $id_lang)
    		->groupby('program.id')
    		->paginate(9);

    		$program->appends($request->only('search_query_first','search_query_last'));
    	}else if($cate == "all" && $cari != null){
    		$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    		->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    		->leftjoin('category', 'category.id', '=', 'program.id_category')
    		->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    		->where('program.deleted_at', null)
    		->where('programlanguage.judul', 'like', '%'.$cari.'%')
    		->orwhere('programlanguage.deskripsi', 'like', '%'.$cari.'%')
    		->where('programlanguage.id_language', $id_lang)
    		->groupby('program.id')
    		->paginate(9);

    		$program->appends($request->only('search_query_first','search_query_last'));
    	}else{
    		$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    		->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    		->leftjoin('category', 'category.id', '=', 'program.id_category')
    		->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    		->where('program.deleted_at', null)
    		->where('programlanguage.judul', 'like', '%'.$cari.'%')
    		->where('category.id', 'like', '%'.$cate.'%')
    		->orwhere('programlanguage.deskripsi', 'like', '%'.$cari.'%')
    		->where('programlanguage.id_language', $id_lang)
    		->groupby('program.id')
    		->paginate(9);
    	}

    	$hasil = 0;
    	foreach ($program as $key => $prog) {
    		$total  = $prog->total;
    		$target = $prog->dana_target;

    		$persen = $target/100;
    		if($persen != null){
    			$hasil  = round($total/$persen);
    			if($hasil > 100){
    				$hasil = 100;
    			}
    		}else{
    			$hasil = 0;
    		}
    	}

    	return view('front_page.'.$this->theme->key.'.pages.programs.programs', compact(
    		'header',
    		'footer',
    		'program',
    		'category_program',
    		'cari',
    		'cate',
    		'hasil',
    		'language'
    	));   
    }

    public function routing(){
    	$urls = MenuFrontPage::all();
    	$endpoint = \Request::getRequestUri();
    	$endpoint = explode('?',$endpoint);

    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	foreach($urls as $url){
    		if("/".$url->url == $endpoint[0]){
    			$header = $this->header;
    			$footer = $this->footer;

                //forUpdates
    			$posting = $this->posting;

                //forcategory
    			$parent_kategori = Parameter::where('key', 'kategori_program')->first();

    			$category = Category::select('category.*','gambar.gambar')
    			->leftjoin('gambar', 'gambar.id_relasi', '=', 'category.id')
    			->where('category.id_parent', $parent_kategori->value)
    			->orderBy('category.order_num', 'asc')
    			->get();

    			$category_program = Category::select('*')
    			->where('category.id_parent', $parent_kategori->value)
    			->orderBy('category.order_num', 'asc')
    			->get();

                //forkisahsukses
    			$parent_kisah = Parameter::where('key', 'kisah_sukses')->first();

    			$kisah_sukses = Posting::select('posting.*', 'posting_language.id_posting', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'posting_language.seo', 'category.category')
    			->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')
    			->join('category', 'category.id', '=', 'posting.id_category')
    			->where('posting_language.id_language', $id_lang)
    			->where('category.id', $parent_kisah->value)
    			->where('posting.status', '1')
    			->orderBy('created_at', 'desc')
    			->get();

                //forslider
    			$slider = Slider::select('slider.*', 'slider_language.id as id_slider_lg','slider_language.judul','slider_language.deskripsi')
    			->join('slider_language', 'slider_language.slider_id', 'slider.id')
    			->where('status', 1)
    			->where('slider_language.id_language', $id_lang)
    			->get();

                //forvideo
    			$link = Parameter::where('key', 'video_home')->first();
    			$links = str_replace("https://www.youtube.com/watch?v=", '', $link->value);
    			// $links = "https://www.youtube.com/embed/".$youtube;


                //forprogram home
    			$program_home = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    			->leftjoin('category', 'category.id', '=', 'program.id_category')
    			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    			->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    			->groupBy('program.id')
    			->get();

                //forprogrampage
    			$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    			->leftjoin('category', 'category.id', '=', 'program.id_category')
    			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    			->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    			->groupBy('program.id')
    			->paginate(9);

    			$jumlah_donasi = Donasi::select('donasi_detail.*', DB::raw('SUM(donasi_detail.nilai_donasi) as total'))->join('donasi_detail', 'donasi_detail.donasi_id', '=', 'donasi.id')->where('status', 'capture')->groupby('donasi_detail.program_id')->get();


                //program zakat

    			$program_zakat = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    			->leftjoin('category', 'category.id', '=', 'program.id_category')
    			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    			->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    			->where('category.category', 'zakat')
    			->groupBy('program.id')
    			->paginate(9);

                //forprofile

    			$profile = Pages::select('*')
    			->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    			->join('parameter', 'parameter.value', '=', 'pages.id')
    			->where('parameter.key', 'content_profile')
    			->where('pages_language.id_language', $id_lang)
    			->first();

    			$content_zakat = Pages::select('*')
    			->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    			->join('parameter', 'parameter.value', '=', 'pages.id')
    			->where('parameter.key', 'content_zakat')
    			->where('pages_language.id_language', $id_lang)
    			->first();

    			$kepengurusan = Kepengurusan::where('deleted_at', null)->get();

    			$sejarah = Sejarah::select('*')
    			->join('sejarah_language', 'sejarah_language.id_sejarah', '=', 'sejarah.id')
    			->where('sejarah.deleted_at', null)
    			->where('sejarah_language.id_language', $id_lang)
    			->get();

    			$footer_text = Parameter::where('key', $id_lang)->first();

    			$language = $this->language;

                //cari
    			$cari = '';
    			$cate = '';

    			$count = count($program);
    			if($endpoint[0] == "/home"){
    				if(\App::getLocale() == "id"){
    					$id_lang = 1;
    				}else{
    					$id_lang = 2;
    				}

    				$posting = Posting::select('posting.*', 'posting_language.id_posting', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'posting_language.seo', 'category.category')->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')->join('category', 'category.id', '=', 'posting.id_category')->where('posting_language.id_language', $id_lang)->where('category.category', "Artikel")->where('posting.status', '1')->orderBy('created_at', 'desc')->limit(4)->get();

    				$program_home = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    				->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    				->leftjoin('category', 'category.id', '=', 'program.id_category')
    				->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    				->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    				->groupBy('program.id')
    				->get();

    				return view('front_page.'.$this->theme->key.'.main_layouts.index', compact(
    					'header', 
    					'footer', 
    					'posting', 
    					'category',
    					'kisah_sukses',
    					'program',
    					'program_home',
    					'slider',
    					'links',
    					'footer_text',
    					'category_program',
    					'language',
    					'kepengurusan',
    					'sejarah',
    					'content_zakat',
    					'jumlah_donasi'
    				));
    			}else{
    				return view(
    					'front_page.'.$this->theme->key.'.pages.'.$url->url.".".$url->url,
    					compact(
    						'header',
    						'footer',
    						'posting',
    						'program',
    						'program_home',
    						'program_zakat',
    						'count',
    						'profile',
    						'category',
    						'cari',
    						'cate',
    						'slider',
    						'links',
    						'footer_text',
    						'category_program',
    						'language',
    						'kepengurusan',
    						'sejarah',
    						'content_zakat',
    						'jumlah_donasi'
    					)
    				);
    			}
    		}
    	}
    }

    #kisah sukses
    public function kisah_sukses($seo)
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;

    	$language = $this->language;

    	$kisah_sukses = Posting::select('posting.*', 'posting_language.id_posting', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'posting_language.seo', 'category.category')
    	->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')
    	->join('category', 'category.id', '=', 'posting.id_category')
    	->where('posting_language.id_language', $id_lang)
    	->where('posting_language.seo', $seo)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.kisah.kisah', compact('header','footer','kisah_sukses','language'));
    }

    #zakat kalkulator
    public function kalkulator()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$id_parent = Parameter::where('key', 'kategori_zakat')->first();

    	$zakat = Category::where('id_parent', $id_parent->value)->get();

    	$zakat_hasil = '';
    	$zakat_harta = '';
    	$zakat_fitrah = '';
    	foreach ($zakat as $key => $value) {
    		if ($value->category == "Zakat Penghasilan") {
    			$zakat_hasil = $value->id;
    		}

    		if($value->category == "Zakat Harta") {
    			$zakat_harta = $value->id;
    		}

    		if ($value->category == "Zakat Fitrah") {
    			$zakat_fitrah = $value->id;
    		}
    	}

    	return view('front_page.'.$this->theme->key.'.pages.zakat.kalkulator-zakat', compact('header','footer', 'zakat_hasil', 'zakat_harta', 'zakat_fitrah','language'));
    }

    public function zakat_penghasilan_store(Request $request)
    {
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$data['hasil_zakat_penghasilan'] = $request->total_zakat;
    	$data['besar_zakat_penghasilan'] = $request->besar_zakat;
    	$kategori = $request->category;

    	$parent_zakat = Parameter::where('key', 'kategori_zakat')->first();
    	$category = Category::select('category.*')
    	->where('id_parent', $parent_zakat->value)
    	->get();

    	if ($data['hasil_zakat_penghasilan'] == "Rp. 0" || $data['hasil_zakat_penghasilan'] == null) {
    		$jumlah_zakat = $request->besar_zakat;
    	}

    	if($data['besar_zakat_penghasilan'] == null || $data['besar_zakat_penghasilan'] == "Rp. 0") {
    		$jumlah_zakat = $request->total_zakat;
    	}

    	return view('front_page.theme1.pages.zakat.form-zakat', compact('jumlah_zakat','header','footer', 'kategori', 'category','language'));
    }

    public function zakat_harta_store(Request $request)
    {
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$data['harta_zakat']       = $request->harta_zakat;
    	$data['besar_zakat_harta'] = $request->besar_zakat;
    	$kategori = $request->category;
    	$parent_zakat = Parameter::where('key', 'kategori_zakat')->first();
    	$category = Category::select('category.*')
    	->where('id_parent', $parent_zakat->value)
    	->get();

    	if ($data['harta_zakat'] == "Rp. 0" || $data['harta_zakat'] == null) {
    		$jumlah_zakat = $request->besar_zakat;
    	}

    	if ($data['besar_zakat_harta'] == null || $data['besar_zakat_harta'] == "Rp. 0") {
    		$jumlah_zakat = $request->harta_zakat;
    	}

    	return view('front_page.theme1.pages.zakat.form-zakat', compact('jumlah_zakat','header','footer', 'kategori', 'category','language'));
    }

    public function zakat_perniagaan_store(Request $request)
    {
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$data['harta_niaga']        = $request->total_perniagaan;
    	$data['besar_zakat_harta']  = $request->besar_zakat;
    	$kategori = $request->category;
    	$parent_zakat = Parameter::where('key', 'kategori_zakat')->first();
    	$category = Category::select('category.*')
    	->where('id_parent', $parent_zakat->value)
    	->get();

    	if ($data['harta_niaga'] == "Rp. 0" || $data['harta_niaga'] == null) {
    		$jumlah_zakat = $request->besar_zakat;
    	}

    	if ($data['besar_zakat_harta'] == null || $data['besar_zakat_harta'] == "Rp. 0") {
    		$jumlah_zakat = $request->total_perniagaan;
    	}

    	return view('front_page.theme1.pages.zakat.form-zakat', compact('jumlah_zakat','header','footer', 'kategori', 'category','language'));
    }

    public function zakat_fitrah_store(Request $request)
    {
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$data['jumlah_zakat']       = $request->jumlah_zakat_fitrah;
    	$data['besar_zakat_harta']  = $request->besar_zakat;
    	$kategori = $request->category;
    	$parent_zakat = Parameter::where('key', 'kategori_zakat')->first();
    	$category = Category::select('category.*')
    	->where('id_parent', $parent_zakat->value)
    	->get();

    	if ($data['jumlah_zakat'] == "Rp. 0" || $data['jumlah_zakat'] == null) {
    		$jumlah_zakat = $request->besar_zakat;
    	}

    	if ($data['besar_zakat_harta'] == null || $data['besar_zakat_harta'] == "Rp. 0") {
    		$jumlah_zakat = $request->jumlah_zakat_fitrah;
    	}

    	return view('front_page.theme1.pages.zakat.form-zakat', compact('jumlah_zakat','header','footer','kategori','category','language')); 
    }

    public function form_zakat()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$jumlah_zakat = '';
    	$kategori = '';
    	$parent_zakat = Parameter::where('key', 'kategori_zakat')->first();
    	$category = Category::select('category.*')
    	->where('id_parent', $parent_zakat->value)
    	->get();

    	$data['hasil_zakat_penghasilan'] = '';
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	return view('front_page.'.$this->theme->key.'.pages.zakat.form-zakat', compact('header','footer','data', 'jumlah_zakat', 'kategori', 'category','language'));
    }

    #end zakat kalkulator

    #program
    public function detailprogram($seo){
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$id = Program::select('program.id')
    	->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->where('programlanguage.seo', $seo)->where('programlanguage.id_language', $id_lang)->first();

    	$dana_terkumpul = DonasiDetail::select(DB::raw('SUM(donasi_detail.nilai_donasi) as total'))
    	->where('program_id', $id->id)
    	->groupBy('program_id')
    	->first();

    	$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul', 'programlanguage.deskripsi', 'category.category')
    	->join('category', 'category.id', '=', 'program.id_category')
    	->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->where('programlanguage.seo', $seo)->where('programlanguage.id_language', $id_lang)->first();

    	$donatur = Donasi::select('users.*', 'guest.nama_lengkap', 'donasi.*','donasi_detail.*')
    	->leftjoin('donasi_detail', 'donasi_detail.donasi_id', '=', 'donasi.id')
    	->leftjoin('users', 'users.id', '=', 'donasi.user_id')
    	->leftjoin('guest',  'guest.id', '=', 'donasi.guest_id')
    	->leftjoin('program', 'program.id', '=', 'donasi_detail.program_id')
    	->leftjoin('programlanguage', 'programlanguage.id_program', 'program.id')
    	->where('programlanguage.id_language', $id_lang)
    	->where('program.id', $id->id)
    	->get();

    	$count  = count($donatur);

    	$new_info = InfoTerbaru::select('info_terbaru.*','info_terbaru_detail.*')
    	->join('info_terbaru_detail', 'info_terbaru_detail.id_info', '=', 'info_terbaru.id')
    	->where('info_terbaru.program_id', $id->id)
    	->where('info_terbaru_detail.id_language', $id_lang)
    	->get();

    	$count_info  = count($new_info);

    	return view('front_page.'.$this->theme->key.'.pages.programs.detailprogram', compact(
    		'header',
    		'footer',
    		'program', 
    		'dana_terkumpul',
    		'donatur',
    		'new_info',
    		'seo',
    		'count',
    		'count_info',
    		'language'
    	));
    }

    public function donasi_program($seo){
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$data["donasi"] = 0;
    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$id = Program::select('program.id')
    	->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->where('programlanguage.seo', $seo)->where('programlanguage.id_language', $id_lang)->first();

    	$dana_terkumpuls = DonasiDetail::select(DB::raw('SUM(donasi_detail.nilai_donasi) as total'))
    	->where('program_id', $id->id)
    	->groupBy('program_id')
    	->first();

    	if ($dana_terkumpuls == null) {
    		$dana_terkumpul = 0;
    	}else{
    		$dana_terkumpul = $dana_terkumpuls;
    	}

    	$program = Program::select('program.*','programlanguage.id as programlanguage_id','programlanguage.judul','programlanguage.deskripsi','programlanguage.seo','donasi_detail.nilai_donasi','category.id as category_id','category.category', DB::raw('SUM(donasi_detail.nilai_donasi)as total'))
    	->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->leftjoin('category', 'category.id', '=', 'program.id_category')
    	->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
    	->where('program.deleted_at', null)->where('programlanguage.id_language', $id_lang)
    	->where('programlanguage.seo', $seo)->where('programlanguage.id_language', $id_lang)->first();

    	return view('front_page.'.$this->theme->key.'.pages.programs.donateform', compact(
    		'header',
    		'footer',
    		'program',
    		'data',
    		'dana_terkumpul',
    		'language'
    	));
    }

    #artikel
    public function update_detail($seo){
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$posting = $this->posting;

    	$posting_detail = Posting::select('posting.*', 'posting_language.id_language', 'posting_language.judul', 'posting_language.content', 'category.category')->join('posting_language', 'posting.id', '=', 'posting_language.id_posting')->join('category', 'category.id', '=', 'posting.id_category')->where('posting_language.id_language', $id_lang)->where('posting_language.seo', $seo)->where('category.category', "Artikel")->first();

    	$comment = Comments::where('id_posting', $posting_detail->id)->where('status', 1)->get();

    	return view('front_page.'.$this->theme->key.'.pages.update.detail_update', compact('header', 'footer', 'posting', 'posting_detail', 'comment','language'));
    }

    #login
    public function login(){
    	$alert  = 0;
    	$status = 0;
    	$userid = 0;
    	$token  = 0;
    	return view('front_page.'.$this->theme->key.'.main_layouts.login', compact('alert', 'status', 'userid', 'token'));
    }

    public function register(){
    	return view('front_page.'.$this->theme->key.'.main_layouts.register');
    }

    public function cek_email($email){
    	header('Content-Type: application/json');
    	$cek = User::where('email', 'like', $email )->first();
    	echo json_encode($cek,200);
    }

    public function pro_register(Request $request){
    	$user = new User;
    	$user->username = $request->username;
    	$user->password = md5($request->password1);
    	$user->name = $request->nama;
    	$user->email = $request->email;
    	$user->alamat = $request->alamat;
    	$user->no_telp = $request->telp;
    	$user->role_id = 2;
    	$user->email_verified = 0;
    	$user->foto = "avatar.png";   
    	$user->save();

    	$emails = new EmailVerify;
    	$emails->token = md5(date('dmYhis'));
    	$emails->id_user = $user->id;
    	$emails->status = 0;
    	$emails->save();

    	$email = $request->email;
    	$token = md5(date('dmYhis'));
    	$triger = "email_verify";
    	Mail::to($email)->send(new EmailRegisterVerify($email, $token, $triger));

    	return redirect('notif-register');
    }

    public function email_verify($tok){
    	$emailv = EmailVerify::where('token', $tok)->first();
    	$emailv->status = 1;
    	$emailv->save();

    	$user = User::where('id', $emailv->id_user)->first();
    	$user->email_verified = 1;
    	$user->save();

    	return redirect('/masuk');
    }

    public function pro_login(Request $request){
    	$username = $request->username;
    	$password = md5($request->password);

    	$result = User::where('username', $username)->where('password', $password)->where('role_id', 2)->first();

    	if ($result == null) {
    		$alert = 1;
    		$status = 0;
    		$userid = 0;
    		$token = 0;
    		return view('front_page.'.$this->theme->key.'.main_layouts.login', compact('alert', 'status', 'userid', 'token'));
    	}else{
    		session::put('id',$result->id);
    		session::put('name', $result->name);
    		session::put('alamat', $result->alamat);
    		session::put('no_telp', $result->no_telp);
    		session::put('email', $result->email);
    		session::put('foto', $result->foto);

    		return redirect('/dashboard-donatur');
    	}
    }

    #dashboard donatur
    public function dashboard_donatur(){
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$user = User::find(Session::get('id'));

    	$history_donatur = Donasi::select('donasi.created_at as tanggal','programlanguage.judul','donasi_detail.nilai_donasi as total')
    	->leftjoin('donasi_detail', 'donasi_detail.donasi_id', '=', 'donasi.id')
    	->leftjoin('users', 'users.id', '=', 'donasi.user_id')
    	->leftjoin('program', 'program.id', '=', 'donasi_detail.program_id')
    	->leftjoin('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->where('users.id', session::get('id'))
    	// ->where('donasi.status', 'capture')
    	->where('programlanguage.id_language', $id_lang)
    	// ->groupBy('program.id')
    	->paginate(9);

    	$count_history_donatur = count($history_donatur);

    	$total_donasi = Donasi::select('donasi.created_at as tanggal','programlanguage.judul', DB::raw('SUM(donasi_detail.nilai_donasi) as total'))
    	->leftjoin('donasi_detail', 'donasi_detail.donasi_id', '=', 'donasi.id')
    	->leftjoin('users', 'users.id', '=', 'donasi.user_id')
    	->leftjoin('program', 'program.id', '=', 'donasi_detail.program_id')
    	->leftjoin('programlanguage', 'programlanguage.id_program', '=', 'program.id')
    	->where('users.id', session::get('id'))
    	// ->where('donasi.status', 'capture')
    	->where('programlanguage.id_language', $id_lang)
    	// ->groupBy('program.id')
    	->first();

    	$history_zakat = Zakat::select('users.name','zakat.created_at as tanggal','zakat_detail.nilai_zakat')->join('zakat_detail', 'zakat_detail.zakat_id', '=', 'zakat.id')
    	->join('users', 'users.id', '=', 'zakat.user_id')->where('zakat.deleted_at', null)
    	->where('zakat.status', 'capture')
    	->where('users.id', session::get('id'))
    	->groupby('zakat.user_id')->paginate(9);

    	return view('front_page.'.$this->theme->key.'.pages.donatur.home', compact(
    		'header', 
    		'footer', 
    		'user', 
    		'history_donatur', 
    		'history_zakat',
    		'count_history_donatur',
    		'total_donasi',
    		'language'
    	));
    }

    public function cek_password($pass_lama){
    	header('Content-Type: application/json');
    	$pass = md5($pass_lama);
    	$id = Session::get('id');
    	$cek = User::where('password', 'like', $pass)->where('id', $id)->first();
    	echo json_encode($cek,200);
    }

    public function post_ganti_password(Request $request, $id){
        // dd($request->all(), $id);
    	$user = User::find($id);
    	$user->password = md5($request->pass_baru);
    	$user->save();

    	if($request->trigger == "forgot password"){
    		$fp = ForgotPassword::where('token', $request->token)->first();
    		$fp->status = 1;
    		$fp->save();

    		$status = 0;$alert = 0;$userid = 0;$token = 0;
    		return view('front_page.'.$this->theme->key.'.main_layouts.login', compact('alert', 'status', 'userid', 'token'));

    	}else{
    		return redirect()->back();
    	}
    }

    public function post_ganti_profile(Request $request, $id){
    	// $file = $_FILES['foto'];

    	$user = User::find($id);
    	$user->name = $request->nama;
    	$user->username = $request->username;
    	$user->no_telp = $request->no_hp;
    	$user->bio = $request->bio;

        // dd($file['name']);
    	// if($file['name'] != null){
    	// 	$ext = explode(".", $_FILES['foto']['name']);
     //        // dd($ext[0].'.'.$ext[1]);
    	// 	$name = "User_".date('dmy_his').".".$ext[0].'.'.$ext[1];
    	// 	$target_dir = "admin/assets/media/foto-users/";
    	// 	$target_file = $target_dir . basename($_FILES["foto"]["name"]);
    	// 	move_uploaded_file($_FILES['foto']['tmp_name'],$target_dir.$name);

    	// 	$user->foto = $name;
    	// }

    	// $user->save();

    	if($request->file('foto') != NULL){
            #upload foto to database
    		$file = $request->file('foto');

            #JIKA FOLDERNYA BELUM ADA
    		if (!File::isDirectory($this->path)) {
                #MAKA FOLDER TERSEBUT AKAN DIBUAT
    			File::makeDirectory($this->path);
    		}

            // #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
    		$fileName = 'Users' . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
    		Image::make($file)->save($this->path . '/' . $fileName);
    		foreach ($this->dimensions as $row) {

                #MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
    			$canvas = Image::canvas($row, $row);

                #RESIZE IMAGE SESUAI DIMENSI YANG ADA DIDALAM ARRAY 
                #DENGAN MEMPERTAHANKAN RATIO
    			$resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
    				$constraint->aspectRatio();
    			});

                #CEK JIKA FOLDERNYA BELUM ADA
    			if (!File::isDirectory($this->path . '/' . $row)) {
                    #MAKA BUAT FOLDER DENGAN NAMA DIMENSI
    				File::makeDirectory($this->path . '/' . $row);
    			}

                #MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
    			$canvas->insert($resizeImage, 'center');
                #SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
    			$canvas->save($this->path . '/' . $row . '/' . $fileName);
    		}

            #SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
    		$user->foto     = $fileName;
    	}
    	$user->save();

    	return redirect()->back();
    }

    public function switch_language(Request $request){
    	Session::put('locale', $request->lang);
    	return redirect()->back();
    }

    #logout
    public function logout(){
    	session::forget('id');
    	session::flush();

    	return redirect('/home');
    }

    public function forgot_password(){
    	return view('front_page.'.$this->theme->key.'.main_layouts.forgot_password');
    }

    public function forgot_password_post(Request $request){
    	$email = $request->email;
    	$user = User::where('email', $email)->first();
    	$fp = new ForgotPassword;
    	$fp->token = md5(date('dmyhis'));
    	$fp->user_id = $user->id;
    	$fp->status = "0";

    	$token = md5(date('dmyhis'));
    	$triger = "forgot_password";
    	Mail::to($email)->send(new EmailRegisterVerify($email, $token, $triger));

    	$fp->save();

    	$alert = 2;
    	$status = 0;
    	$userid = 0;
    	$token = 0;
    	return view('front_page.'.$this->theme->key.'.main_layouts.login', compact('alert', 'status', 'userid', 'token'));
    }

    public function verify_forgot_password($token){
    	$fp = ForgotPassword::where('token', $token)->first();
    	if($fp->status == 0){
    		$status = 1;
    		$alert = 0;
    		$userid = $fp->user_id;
    		$token = $token;

    		return view('front_page.'.$this->theme->key.'.main_layouts.login', compact('alert', 'status', 'userid', 'token'));
    	}else{
    		$status = 0;$alert = 3;$userid = 0;$token = 0;
    		return view('front_page.'.$this->theme->key.'.main_layouts.login', compact('alert', 'status', 'userid', 'token'));
    	}
    }

    public function notif_register(){
    	return view('front_page.'.$this->theme->key.'.pages.notif.notif_register');
    }

    public function get_kategori($id)
    {
    	$kategori = Category::select('*')->where('id', $id)->first();
    	return response()->json($kategori);
    }

    public function syarat_dan_ketentuan()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$parameter = Parameter::where('key', 'syarat&ketentuan')->first();
    	$content = Pages::select('pages_language.*')
    	->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    	->where('pages.id', $parameter->value)
    	->where('pages_language.id_language', $id_lang)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.footer.syarat_dan_ketentuan', compact('header','footer','language','content'));
    }

    public function ketentuan_privacy()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header = $this->header;
    	$footer = $this->footer;
    	$language = $this->language;

    	$parameter = Parameter::where('key', 'ketentuan&privacy')->first();
    	$content = Pages::select('pages_language.*')
    	->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    	->where('pages.id', $parameter->value)
    	->where('pages_language.id_language', $id_lang)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.footer.ketentuan_dan_privasi', compact('header','footer','language','content'));
    }

    public function kontak()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header   = $this->header;
    	$footer   = $this->footer;
    	$language = $this->language;

    	$content = Pages::select('pages_language.*')
    	->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    	->join('category', 'category.id', '=', 'pages.id_category')
    	->where('category.category', 'kontak')
    	->where('pages_language.id_language', $id_lang)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.footer.kontak', compact('header','footer','language','content'));
    }

    public function kantor_cabang()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header   = $this->header;
    	$footer   = $this->footer;
    	$language = $this->language;

    	$parameter = Parameter::where('key', 'kantor_cabang')->first();
    	$content = Pages::select('pages_language.*')
    	->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    	->join('category', 'category.id', '=', 'pages.id_category')
    	->where('pages.id', $parameter->value)
    	->where('pages_language.id_language', $id_lang)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.footer.kantor_cabang', compact('header','footer','language','content'));
    }

    public function kebijakan_refund()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header   = $this->header;
    	$footer   = $this->footer;
    	$language = $this->language;

    	$parameter = Parameter::where('key', 'kebijakan_refund')->first();
    	$content = Pages::select('pages_language.*')
    	->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    	->join('category', 'category.id', '=', 'pages.id_category')
    	->where('pages.id', $parameter->value)
    	->where('pages_language.id_language', $id_lang)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.footer.kebijakan_refund', compact('header','footer','language','content'));
    }

    public function rekening_donasi()
    {
    	if(\App::getLocale() == "id"){
    		$id_lang = 1;
    	}else{
    		$id_lang = 2;
    	}

    	$header   = $this->header;
    	$footer   = $this->footer;
    	$language = $this->language;

    	$parameter = Parameter::where('key', 'rekening_donasi')->first();
    	$content = Pages::select('pages_language.*')
    	->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
    	->join('category', 'category.id', '=', 'pages.id_category')
    	->where('pages.id', $parameter->value)
    	->where('pages_language.id_language', $id_lang)
    	->first();

    	return view('front_page.'.$this->theme->key.'.pages.footer.rekening_donasi', compact('header','footer','language','content'));
    }
}
