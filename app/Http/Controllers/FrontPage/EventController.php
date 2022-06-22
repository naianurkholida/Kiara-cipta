<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Language;
use App\Entities\FrontPage\LogClick;

class EventController extends Controller
{
    public function __construct(Request $request)
    {
        $language = Language::first()->id;

        $locale = Session::get('locale');

        if ($locale == NULL) {
            $locale = Session::put('locale', $language);
        }
    }

    public function index(Request $request)
    {
        $data = Posting::with('getPostingLanguage', 'category')
                ->whereHas('category', function($q) {
                    $q->where('seo', 'event');
                })
                ->get();

        return view('frontend.event', compact('data'));
    }

    public function show($seo)
    {
        $data = Posting::with('getPostingLanguage', 'category')
                ->whereHas('category', function($q) {
                    $q->where('seo', 'event');
                })
                ->whereHas('getPostingLanguage', function($query) use ($seo){
                    $query->where('seo', $seo)->where('id_language', Session::get('locale') ? Session::get('locale') : 1);
                })
                ->first();

        $event_lainnya = Posting::with('getPostingLanguage', 'category')
                ->whereHas('category', function($q) {
                    $q->where('seo', 'event');
                })
                ->whereHas('getPostingLanguage', function($query) use ($seo){
                    $query->where('seo', '!=', $seo)->where('id_language', Session::get('locale') ? Session::get('locale') : 1);
                })
                ->orderBy('id', 'desc')
                ->get();

        return view('frontend.event-detail', compact('data', 'event_lainnya'));
    }
}
