<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Entities\Admin\core\Menu as Menu;
use App\Entities\Admin\core\MenuAccess as MenuAccess;
use App\Entities\Admin\core\User as User;
use App\Entities\Admin\core\Role as Role;
use Carbon\Carbon;
use DB;
use Image;
use File;
use Alert;

class UserController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path = 'admin/assets/media/foto-users';
        //Definisi Dimensi Foto
		$this->dimensions = ['245', '300', '500'];
	}

	public function top_bar()
	{
		$data['menu_item'] = MenuAccess::select('*')
		->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
		->where('role_id', \Session::get('role_id'))
		->where('menus.parent_id', '0')
		->where('menus.deleted_at', null)
		->orderBy('order_num','ASC')
		->get();

		$data['setting']   = MenuAccess::select('*')
		->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
		->where('role_id', \Session::get('role_id'))
		->where('menus.parent_id', '!=', 0)
		->where('menus.deleted_at', null)
		->orderBy('order_num','ASC')
		->get();

		return $data;
	}

	public function index()
	{
		$top_bar = $this->top_bar();
		$user = User::select('users.*','roles.name as role_user')
		->join('roles', 'roles.id','=','users.role_id')
		->where('users.deleted_at', '=', null)
		->get();

		$validasi = MenuAccess::select('*')
		->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
		->where('role_id', \Session::get('role_id'))
		->where('menus.deleted_at', null)
		->where('menus.id', 4)
		->first();
		return view('admin.core.user.index', compact('user','top_bar', 'validasi'));
	}

	public function insert()
	{
		$pesan = '';
		$top_bar = $this->top_bar();
		$role = Role::select('*')->where('deleted_at','=', null)->get();
		return view('admin.core.user.insert', compact('role','top_bar','pesan'));
	}

	public function store(Request $request)
	{
		$username = User::select('username')->where('username', $request->username)->get();
		$email = User::select('email')->where('email', $request->email)->get();
		$cek = count($username);
		$cek2 = count($email);


		if($cek == 0 && $cek2 == 0){
			$user = new User;
			$user->username = $request->username;
			$user->password = md5($request->password);
			$user->name     = $request->nama;
			$user->email    = $request->email;
			$user->alamat   = $request->alamat;
			$user->role_id  = $request->role;
			$user->is_created = Session::get('id');
			$user->email_verified = 1;
			$user->save();

			if ($request->foto != NULL) {
				$media = $user->getFirstMedia('user');
				
				if ($media != NULL) {
					$media->delete();
				}
				
				$user->addMedia($request->foto)->toMediaCollection('user');
			}
		}else{
			$top_bar = $this->top_bar();
			$role = Role::select('*')->where('deleted_at','=', null)->get();
			$pesan = "Username Telah Digunakan, Mohon Gunakan Username Lain, Isi Ulang Kembali Data Anda!";
			return view('admin.core.user.insert', compact('role','top_bar','pesan'));
		}
		return redirect('/user')->with('success', 'Data Berhasil di Simpan');
	}

	public function edit($id)
	{
		$top_bar = $this->top_bar();
		$user = User::find($id);
		$role  = Role::all();

		$data = $user->getFirstMediaUrl('user');

		return view('admin.core.user.edit', compact('user','role','top_bar', 'data'));
	}

	public function update(Request $request, $id)
	{
		$user = User::select('users.*', 'roles.code')
		->join('roles', 'roles.id', '=', 'users.role_id')
		->where('users.id', $id)
		->first();

		$user->username = $request->username;
		if ($request->password != NULL) {
			$user->password = md5($request->password);
		}
		$user->name     = $request->nama;
		$user->email    = $request->email;
		$user->alamat   = $request->alamat;
		$user->role_id  = $request->role;
		$user->is_created = Session::get('id');
		$user->save();

		if ($request->foto != NULL) {
			$media = $user->getFirstMedia('user');

			if ($media != NULL) {
				$media->delete();
			}

			$user->addMedia($request->foto)->toMediaCollection('user');
		}

		return redirect('/user')->with('info', 'Data Berhasil di Update');
	}

	public function delete($id)
	{
		$user = User::find($id);
		
		$media = $user->getFirstMedia('user');

		if ($media != NULL) {
			$media->delete();
		}
		
		$user->deleted_at = date('Y-m-d H:i:s');
		$user->save();
		return redirect('/user')->with('danger', 'Data Berhasil di Hapus');
	}
}
