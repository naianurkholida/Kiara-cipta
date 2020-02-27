<?php

namespace App\Http\Controllers\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Language;

class SwitchLanguageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $data = Language::where('code', $id)->firstOrFail();

        Session::put('locale', $data->id);

        return redirect()->back();
    }
}
