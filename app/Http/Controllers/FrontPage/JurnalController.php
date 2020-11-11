<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Treatment;
use App\Entities\FrontPage\Pengunjung;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\Posting;
use Session;

class JurnalController extends Controller
{
	public function __construct(Request $request)
	{
		$language = Language::first()->id;

		$locale = Session::get('locale');

		if ($locale == NULL) {
			$locale = Session::put('locale', $language);
		}
	}
	
	public function index()
	{
		$data = Posting::with('getPostingLanguage')
				->where('id_category', 58)
				->get();

		return view('frontend.jurnal', compact('data'));
	}

	public function show($seo)
	{
		$data = Posting::with('getPostingLanguage')
				->where('id_category', 58)
				->whereHas('getPostingLanguage', function($query) use ($seo){
					$query->where('seo', $seo);
				})
				->first();

		return view('frontend.jurnal-detail', compact('data'));
	}
}
