<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Entities\Admin\core\Pages;

class DashboardCustomerController extends Controller
{
    public function profile(Request $request)
    {
        $info_member = Pages::join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
                       ->join('category', 'category.id', '=', 'pages.id_category')
                       ->where('category.seo', 'info-member')
                       ->where('pages_language.id_language', 1)
                       ->first();

        return view('frontend.customer.profile', compact('info_member'));
    }

    public function history(Request $request)
    {
        return view('frontend.customer.check_point');
    }

    public function changePoint(Request $request)
    {
        return view('frontend.customer.change_poin');
    }

    public function _json_customer(Request $request)
    {
        $client = new Client();

        $id = $request->id;

        $response = $client->request('GET', 'http://103.11.135.246:1506/customer/?id='.$id);

        $res = $response->getBody();
        $data = json_decode($res);

        return response()->json([
            'status' => $response->getStatusCode(),
            'customer' => $data[0]
        ]);
    }
}