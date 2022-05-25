<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\FrontPage\LogClick;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function index()
    {
        $data = LogClick::all();

		return view('admin.core.history.index', compact('data'));
    }
}
