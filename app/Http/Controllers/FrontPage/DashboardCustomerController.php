<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\Entities\Admin\core\Pages;
use App\Entities\Admin\core\Settings;

class DashboardCustomerController extends Controller
{
    public function profile(Request $request)
    {
        $client = new Client();

        $id = \Session::get('customer_no_telp');

        $response = $client->request('GET', 'http://103.11.135.246:1506/customer/?id='.$id);

        $res = $response->getBody();
        $data = json_decode($res);

        $level_member = strtolower($data[0][3]);

        $settings = Settings::where('key', $level_member)->first();
        
        $info_member = Pages::join('pages_language', 'pages_language.id_pages', '=', 'pages.id')
                       ->join('category', 'category.id', '=', 'pages.id_category')
                       ->where('category.seo', 'info-member')
                       ->where('pages_language.id_language', 1)
                       ->first();

        return view('frontend.customer.profile', compact('info_member', 'data', 'settings'));
    }

    public function history(Request $request)
    {
        $client = new Client();
        $customer_id = session::get('customer_id');
        $data = json_decode($client->request('GET', 'http://103.11.135.246:1506/CustPoint/?id='.$customer_id)->getBody());

        // return response()->json($data);

        return view('frontend.customer.check_point', compact('data'));
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

    public function _blast_email()
    {
        $client = new Client();

        $response = $client->request('POST', 'http://103.11.135.246:1506/blast?recipient_id=&recipient_name=Agus Setiawan&recipient_email=luciversetiawan110@gmail.com&nama_product=test&url=http:://image.com');

        $res = $response->getBody();
        $data = json_decode($res);

        return response()->json([
            'status' => $response->getStatusCode(),
            'customer' => $data[0]
        ]);
    }
}
