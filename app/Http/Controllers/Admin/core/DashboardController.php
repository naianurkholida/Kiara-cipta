<?php

namespace App\Http\Controllers\admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __invoke()
    {
        return view('admin.core.dashboard.dashboard');
	}
}
