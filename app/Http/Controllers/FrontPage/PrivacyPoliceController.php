<?php

namespace App\Http\Controllers\FrontPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Pages;
use App\Entities\Admin\core\PagesLanguage;
use App\Entities\Admin\core\Language;

class PrivacyPoliceController extends Controller
{
    public function index()
    {
        $content = Pages::select('*')
                ->join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
                ->where('pages_language.id_language', 1)
                ->join('parameter', 'parameter.value', '=', 'pages.id')
                ->where('parameter.key', 'ketentuan&privacy')
                ->first();

        return view('frontend.privacy_police', compact('content'));
    }
}
