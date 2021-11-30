<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class LoginController extends Controller
{
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

    	$body = $response->getBody();
    	$body_array = json_decode($body);

    	return response()->json([
    		'status' => $response->getStatusCode(),
    		'message' => $body_array
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
}
