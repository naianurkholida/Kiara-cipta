<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Entities\Admin\core\User as User;
use App\Entities\Admin\core\AccessToken as AccessToken;
use DB;

class LoginController extends Controller
{
	public function form_login()
	{
		return view('admin.core.login.form_login');
	}

	public function create_token($id,$token){
		$plus7 = strtotime('+7 day');
		$expire_date = date('Y-m-d H:i:s', $plus7);

		DB::table('access_token')->insert([
			'id' 		 => $token,
			'user_id'    => $id,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
			'expired_at' => $expire_date
		]);
	}

	public function proses_login(Request $request){
		$username = $request->username;
		$password = md5($request->password);

		$now 		 = date('Y-m-d H:i:s');
		$token       = md5($now);
		$expires_in  = strtotime('+7 days');

		$data = User::where('username',$username)->first();

		if($data){
			$this->create_token($data->id, $token);

			if($password == $data->password){
				session::put('id', $data->id);
				session::put('name',$data->name);
				session::put('email',$data->email);
				session::put('foto', $data->foto);
				session::put('role_id', $data->role_id);
				session::put('login', $data);
				return redirect('/dashboard');
			} else {
				return redirect('/login')->with('alert','Periksa Kembali Username dan Password Anda !');
			}
		}else{
			return redirect('/login')->with('alert','Periksa Kembali Username dan Password Anda !');
		}
	}

	public function logout()
	{
		session::flush();
		return redirect('/login');
	}

	public function error404()
	{
		echo "string";
	}
}
