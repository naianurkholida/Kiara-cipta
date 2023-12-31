<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Entities\Admin\core\Language;
use App\Entities\FrontPage\Pengunjung;

class LoginController extends Controller
{
    public function __construct(Request $request)
    {
        $language = Language::first()->id;

        $locale = Session::get('locale');

        if ($locale == NULL) {
            $locale = Session::put('locale', $language);
        }

        $cekip = Pengunjung::where('ip', $request->ip())->first();

        if($cekip == null){
            $pengunjung = new Pengunjung;
            $pengunjung->ip = $request->ip();
            $pengunjung->save();
        }
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function login_post(Request $request)
    {
    	$client = new Client();

    	$username = $request->username;
    	$password = $request->password;

        $response = $client->request('POST', 'http://103.11.135.246:1506/login', ['query' => [
            'username' => $username,
            'password' => $password
        ]]);

    	$res = $response->getBody();
    	$notif = json_decode($res);

        $customer = $client->request('GET', 'http://103.11.135.246:1506/datapercustomer', ['query' => [
            'tel' => $username
        ]]);

        $res2 = $customer->getBody();
        $response_users = json_decode($res2);

        if($response_users != null){
            $dataCustomer = $response_users[0];

            session::put('customer_id', $dataCustomer->CUSTOMER_ID);
            session::put('customer_name',$dataCustomer->CUSTOMER_NAME);
            session::put('customer_email',$dataCustomer->EMAIL);
            session::put('customer_address', $dataCustomer->ADDRESS);
            session::put('customer_no_telp', $dataCustomer->TELEPHON);

        }else{
            $dataCustomer = [];
        }

    	return response()->json([
    		'status' => $response->getStatusCode(),
    		'message' => $notif,
            'customer' => $dataCustomer
    	]);
    }

    public function forgot()
    {
        return view('frontend.auth.forgot');
    }

    public function forgot_post(Request $request)
    {
        $client = new Client();

        $username = $request->username;
        $password = $request->password;
        $new_password = $request->new_password;

        $response = $client->request('POST', 'http://103.11.135.246:1506/changepw', ['query' => [
            'username' => $username,
            'pass_old' => $password,
            'pass_new' => $new_password
        ]]);

        $body = $response->getBody();
        $body_array = json_decode($body);

        return response()->json([
            'status' => $response->getStatusCode(),
            'message' => $body_array
        ]);
    }

    public function logout(Request $request)
    {
        session::forget('customer_id');
        session::forget('customer_name');
        session::forget('customer_email');
        session::forget('customer_address');
        session::forget('customer_no_telp');

        return redirect('/');
    }

    public function customer()
    {
        return view('frontend.auth.dashboard');
    }

    public function profile(Request $request, $no_telp)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://103.11.135.246:1506/datapercustomer', ['query' => [
            'tel' => $no_telp
        ]]);

        $body = $response->getBody();
        $data = json_decode($body);

        $customer_id = $data[0]->CUSTOMER_ID;
        $history = json_decode($client->request('GET', 'http://103.11.135.246:1506/CustPoint/?id='.$customer_id)->getBody());

        return response()->json([
            'status' => $response->getStatusCode(),
            'message' => $data,
            'data' => $history
        ]);
    }
}
