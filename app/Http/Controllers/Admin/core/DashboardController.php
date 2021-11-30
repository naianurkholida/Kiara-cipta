<?php

namespace App\Http\Controllers\admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\Treatment;
use App\Entities\FrontPage\Pengunjung;
use DB;

class DashboardController extends Controller
{
	public function __invoke()
    {
    	$pengunjung = Pengunjung::select(DB::raw('COUNT(id) as total_pengunjung'))->first();
    	$product  = Produk::select(DB::raw('COUNT(id) as total_product'))->where('deleted_at', null)->first();
    	$treatment = Treatment::select(DB::raw('COUNT(id) as total_treatment'))->where('deleted_at', null)->first();
        return view('admin.core.dashboard.dashboard', compact('pengunjung','product','treatment'));
	}
}
