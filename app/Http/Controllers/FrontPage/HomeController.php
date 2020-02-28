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
        $facebook  = Parameter::where('key', 'facebook')->first();
        $instagram = Parameter::where('key', 'instagram')->first();
        $twitter   = Parameter::where('key', 'twitter')->first();
        $whatsapp  = Parameter::where('key', 'whatsapp')->first();
        $email = Parameter::where('key', 'email')->first();

        return view($this->view, compact('facebook','instagram','twitter','whatsapp','email'));
    }
}
