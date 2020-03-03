<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Parameter;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->view = 'frontend.home';

        $language = Language::first()->id;

        $locale = Session::get('locale');

        if ($locale == NULL) {
            $locale = Session::put('locale', $language);
        }
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view($this->view);
    }
}
