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
				->whereIn('id_category', [58,51])
				->orderBy('id', 'desc')
				->paginate(5);

		return view('frontend.jurnal', compact('data'));
	}

	public function show($seo)
	{
		$data = Posting::with('getPostingLanguage')
				->whereIn('id_category', [58,51])
				->whereHas('getPostingLanguage', function($query) use ($seo){
					$query->where('seo', $seo)->where('id_language', 1);
				})
				->first();

		$detail = Posting::with('getPostingLanguage')
				->whereIn('id_category', [58,51])
				->orderBy('id', 'desc')
				->limit(3)
				->inRandomOrder()
				->get();

		return view('frontend.jurnal-detail', compact('data', 'detail'));
	}

	public function blog()
	{
		$data = Posting::with('getPostingLanguage')
				->where('id_category', 51)
				->get();

		return view('frontend.jurnal', compact('data'));
	}

	public function media()
	{
		$data = Posting::with('getPostingLanguage')
				->where('id_category', 58)
				->get();

		return view('frontend.jurnal', compact('data'));
	}
}
