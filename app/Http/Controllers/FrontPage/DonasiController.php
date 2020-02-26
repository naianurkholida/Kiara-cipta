<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Veritrans\Midtrans;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Entities\Admin\modul\Donasi;
use App\Entities\Admin\modul\DonasiDetail;
use App\Mail\Email\EmailKonfirmasiPembayaran;
use App\Entities\Admin\modul\Guest;
use App\Entities\Admin\core\Theme;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use App\Entities\Admin\core\Bank;
use App\Entities\Admin\core\Program;
use App\Entities\Admin\modul\KonfirmasiPembayaran as Pay;
use Image;
use File;

class DonasiController extends Controller
{
	public function __construct()
	{
        //Definisi PATH Foto
		$this->path =  'admin/assets/media/img';

		Midtrans::$serverKey = env('MIDTRANS_SERVER_KEY', '');
		Midtrans::$isProduction = env('MIDTRANS_PRODUCTION', true);

		if(\App::getLocale() == "id"){
			$id_lang = 1;
		}else{
			$id_lang = 2;
		}

		$this->language = $id_lang;

		$this->theme = Theme::where('status', 1)->first();

		$this->header = MenuFrontPage::join('menu_front_page_language', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')->join('category', 'menu_front_page.id_category', '=', 'category.id')->where('category.category', "Menu Header")->where('menu_front_page.id_sub_menu', 0)->where('menu_front_page_language.id_language', $id_lang)->orderBy('menu_front_page.sort_order', 'asc')->get();

		$this->footer = MenuFrontPage::join('menu_front_page_language', 'menu_front_page.id', '=', 'menu_front_page_language.id_menu_front_page')->join('category', 'menu_front_page.id_category', '=', 'category.id')->where('category.category', "Menu Footer")->where('menu_front_page.id_sub_menu', 0)->where('menu_front_page_language.id_language', $id_lang)->orderBy('menu_front_page.sort_order', 'asc')->get();
	}

	public function token() 
	{
		error_log('masuk ke snap token adri ajax');
		$midtrans = new Midtrans;
		$transaction_details = array(
			'order_id'       => uniqid(),
			'gross_amount'   => Input::get('jumlah_donasi')
		);
		
        // Populate items
		$items = [
			array(
				'id'            => 'donasi1',
				'price'         => Input::get('jumlah_donasi'),
				'quantity'      => 1,
				'name'          => Input::get('nama_produk')
			)
		];

        // Populate customer's billing address
		$billing_address = array(
			'first_name'        => Input::get('nama'),
			'last_name'         => '',
			'address'           => '',
			'city'              => '',
			'postal_code'       => '',
			'phone'             => Input::get('no_telp'),
			'country_code'      => 'IDN'
		);

        // Populate customer's shipping address
		$shipping_address = array(
			'first_name'        => Input::get('nama'),
			'last_name'         => '',
			'address'           => '',
			'city'              => '',
			'postal_code'       => '',
			'phone'             => Input::get('no_telp'),
			'country_code'      => 'IDN'
		);

        // Populate customer's Info
		$customer_details = array(
			'first_name'        => Input::get('nama'),
			'last_name'         => '',
			'email'             => Input::get('email'),
			'phone'             => Input::get('no_telp'),
			'billing_address'   => $billing_address,
			'shipping_address'  => $shipping_address
		);

        // Data yang akan dikirim untuk request redirect_url.
		$transaction_data = array(
			'transaction_details'=> $transaction_details,
			'item_details'       => $items,
			'customer_details'   => $customer_details
		);

		try
		{
			$snap_token = $midtrans->getSnapToken($transaction_data);
			echo $snap_token;
		} 
		catch (Exception $e) 
		{   
			return $e->getMessage;
		}
	}

	public function finish(Request $request)
	{

		$metode_pembayaran = $request->input('metode_pembayaran');

		#transfer manual
		if ($metode_pembayaran == 1) {
			if($request->input('donationtext') == ""){
				$total_i = $request->input('donation');
				$total_s = substr($total_i, 4);
				$total   = str_replace('.','', $total_s);
			} else {
				$total_i = $request->input('donationtext');
				$total_s = substr($total_i, 4);
				$total   = str_replace('.','', $total_s);
			}

			if(!session::has('id')){
				$guest = Guest::create([
					'nama_lengkap' 	=> $request->input('nama'),
					'no_telp'		=> $request->input('no_telp'),
					'email'			=> $request->input('email'),
					'alamat'		=> ''
				]);

				$donasi = Donasi::create([
					'user_id'           => 0,
					'guest_id'          => $guest->id,
					'total_donasi'      => $total,
					'status'            => 'pending',
					'metode_pembayaran' => 'transfer manual',
					'batas_pembayaran'  => Null,
					'snap_token'        => md5(date('Ymd')),
					'mid_order_id'      => uniqid()
				]);
			}else{
				$donasi = Donasi::create([
					'user_id'           => $request->input('user_id'),
					'guest_id'          => 0,
					'total_donasi'      => $total,
					'status'            => 'pending',
					'metode_pembayaran' => 'transfer manual',
					'batas_pembayaran'  => Null,
					'snap_token'        => md5(date('Ymd')),
					'mid_order_id'      => uniqid()
				]);
			}

			$donasi_detail = DonasiDetail::create([
				'donasi_id'     => $donasi->id,
				'program_id'    => $request->input('program_id'),
				'akad_id'       => 0,
				'nilai_donasi'  => $total,
				'komentar'      => ($request->input('komentar'))?$request->input('komentar'):'-',
				'anonim'        => ($request->input('anonim'))?$request->input('anonim'):0,
				'verifikasi'    => ($request->input('verifikasi'))?$request->input('verifikasi'):0,
			]);

			$email 		  	   = $request->input('email');
			$nama 		  	   = $guest->nama_lengkap; 
			$token 	  	  	   = $donasi->mid_order_id;
			$total 		  	   = $donasi->total_donasi;
			$metode_pembayaran = $donasi->metode_pembayaran;
			$no_telepon 	   = $guest->no_telp;
			$alamat 		   = $guest->alamat;
			$triger 	  	   = "konfirmasi_pembayaran";
			$bank 			   = Bank::where('deleted_at', null)->get();

			Mail::to($email)->send(new EmailKonfirmasiPembayaran($email, $nama, $token, $total, $metode_pembayaran, $no_telepon, $alamat, $triger, $bank));
		}else{

			#virtual account
			$result = $request->input('result_data');
			$result = json_decode($result);

			if($request->input('donationtext') == ""){
				$total_i = $request->input('donation');
				$total_s = substr($total_i, 4);
				$total   = str_replace('.','', $total_s);
			} else {
				$total_i = $request->input('donationtext');
				$total_s = substr($total_i, 4);
				$total   = str_replace('.','', $total_s);
			}

			if(session::has('id') == null){
				$guest = Guest::create([
					'nama_lengkap' 	=> $request->input('nama'),
					'no_telp'		=> $request->input('no_telp'),
					'email'			=> $request->input('email'),
					'alamat'		=> ''
				]);

				$donasi = Donasi::create([
					'user_id'           => 0,
					'guest_id'          => $guest->id,
					'total_donasi'      => $total,
					'status'            => $result->transaction_status,
					'metode_pembayaran' => $result->payment_type,
					'batas_pembayaran'  => Null,
					'snap_token'        => $result->transaction_id,
					'mid_order_id'      => $result->order_id
				]);
			}else{
				$donasi = Donasi::create([
					'user_id'           => $request->input('user_id'),
					'guest_id'          => 0,
					'total_donasi'      => $total,
					'status'            => $result->transaction_status,
					'metode_pembayaran' => $result->payment_type,
					'batas_pembayaran'  => Null,
					'snap_token'        => $result->transaction_id,
					'mid_order_id'      => $result->order_id
				]);
			}

			$donasi_detail = DonasiDetail::create([
				'donasi_id'     => $donasi->id,
				'program_id'    => $request->input('program_id'),
				'akad_id'       => 0,
				'nilai_donasi'  => $total,
				'komentar'      => ($request->input('komentar'))?$request->input('komentar'):'-',
				'anonim'        => ($request->input('anonim'))?$request->input('anonim'):0,
				'verifikasi'    => ($request->input('verifikasi'))?$request->input('verifikasi'):0,
			]);
		}
	}

	public function setSuccess()
	{
		$header = $this->header;
		$footer = $this->footer;
		$language = $this->language;

		return view('front_page.'.$this->theme->key.'.pages.notif.success', compact('header','footer','language'));
	}

	public function setPending()
	{
		$header = $this->header;
		$footer = $this->footer;
		$language = $this->language;

		return view('front_page.'.$this->theme->key.'.pages.notif.pending', compact('header','footer','language'));
	}

	public function setKonfirmasi()
	{
		if(\App::getLocale() == "id"){
			$id_lang = 1;
		}else{
			$id_lang = 2;
		}

		$header = $this->header;
		$footer = $this->footer;
		$language = $this->language;

		$bank = Bank::where('deleted_at', null)->get();

		if(session::has('id') == null){
			$data = Program::select('program.id as programid','programlanguage.judul','donasi.*','guest.nama_lengkap')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->leftjoin('guest', 'guest.id', '=', 'donasi.guest_id')
			->where('programlanguage.id_language', $id_lang)
			->orderBy('donasi.guest_id', 'DESC')
			->first();

		}else{
			$data = Program::select('program.id as programid','programlanguage.judul','donasi.*','users.nama_lengkap')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->leftjoin('users', 'users.id', '=', 'donasi.user_id')
			->where('programlanguage.id_language', $id_lang)
			->where('donasi.user_id', session::get('id'))
			->orderBy('donasi.guest_id', 'DESC')
			->first();
		}

		return view('front_page.'.$this->theme->key.'.pages.notif.konfirmasi', compact('header','footer','language','data','bank'));
	}

	public function setKonfirmasi2()
	{
		$header = $this->header;
		$footer = $this->footer;
		$language = $this->language;

		return view('front_page.'.$this->theme->key.'.pages.notif.notif_konfirmasi', compact('header','footer','language'));
	}

	public function konfirmasi_pembayaran($id)
	{
		if(\App::getLocale() == "id"){
			$id_lang = 1;
		}else{
			$id_lang = 2;
		}

		$header = $this->header;
		$footer = $this->footer;
		$language = $this->language;

		$bank = Bank::select('*')->where('deleted_at', null)->get();

		if(session::has('id') == null){
			$detail_transfer = Program::select('program.id as programid','programlanguage.judul','donasi.*')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->where('programlanguage.id_language', $id_lang)
			->orderBy('donasi.guest_id', 'DESC')
			->limit(1)
			->first();

			$data = Program::select('program.id as programid','programlanguage.judul','donasi.*','guest.nama_lengkap')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->leftjoin('guest', 'guest.id', '=', 'donasi.guest_id')
			->where('programlanguage.id_language', $id_lang)
			->where('donasi.mid_order_id', $id)
			->orderBy('donasi.guest_id', 'DESC')
			->first();

			$totals = number_format($data->total_donasi);
			$total_donasis = str_replace(',','.',$totals);
		}else{
			$detail_transfer = Program::select('program.id as programid','programlanguage.judul','donasi.*')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->where('donasi.user_id', session::get('id'))
			->where('programlanguage.id_language', $id_lang)
			->orderBy('donasi.id', 'DESC')
			->first();

			$data = Program::select('program.id as programid','programlanguage.judul','donasi.*','users.name as nama_lengkap')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->leftjoin('users', 'users.id', '=', 'donasi.users_id')
			->where('programlanguage.id_language', $id_lang)
			->where('donasi.mid_order_id', $id)
			->orderBy('donasi.guest_id', 'DESC')
			->first();

			$totals = number_format($data->total_donasi);
			$total_donasis = str_replace(',','.',$totals);
		}

		$total = number_format($detail_transfer->total_donasi);
		$total_donasi = str_replace(',','.',$total);

		return view('front_page.'.$this->theme->key.'.pages.programs.detail_transfer', compact('header','footer','language','bank', 'detail_transfer','total_donasi','data','total_donasis'));
	}

	public function konfirmasi_pay(Request $request)
	{
		$total_i = $request->input('total');
		$total_s = substr($total_i, 4);
		$total   = str_replace('.','', $total_s);

		$total_is = $request->input('total_submit');
		$total_ss = substr($total_is, 4);
		$total_submit = str_replace('.','', $total_ss);

		$guest = Guest::where('deleted_at', null)->orderBy('id', 'DESC')->limit(1)->first();

		$pay = new Pay;


		if($request->file('berkas') != NULL){
            #upload foto to database
			$file = $request->file('berkas');

            #JIKA FOLDERNYA BELUM ADA
			if (!File::isDirectory($this->path)) {
                #MAKA FOLDER TERSEBUT AKAN DIBUAT
				File::makeDirectory($this->path);
			}

            // #MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
			$fileName = 'Berkas' . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            #UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
			Image::make($file)->save($this->path . '/' . $fileName);

            #SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
			$pay->id_guest 			 = $guest->id;
			$pay->id_bank 			 = $request->id_bank;
			$pay->id_program		 = $request->id_program;
			$pay->total 			 = $total;
			$pay->total_submit  	 = $total_submit;
			$pay->tanggal_konfirmasi = $request->tanggal_konfirmasi;
			$pay->bank_pengirim 	 = $request->bank_pengirim;
			$pay->nama_pengirim 	 = $request->nama_pengirim;
			$pay->berkas = $fileName;
			$pay->save();
		}

		$header = $this->header;
		$footer = $this->footer;
		$language = $this->language;

		return view('front_page.'.$this->theme->key.'.pages.notif.notif_konfirmasi', compact('header','footer','language'));
	}

	public function get_invoice(Request $request, $id)
	{
		if(\App::getLocale() == "id"){
			$id_lang = 1;
		}else{
			$id_lang = 2;
		}

		if(session::has('id') == null){
			$data = Program::select('program.id as programid','programlanguage.judul','donasi.*','guest.nama_lengkap')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->leftjoin('guest', 'guest.id', '=', 'donasi.guest_id')
			->where('programlanguage.id_language', $id_lang)
			->where('donasi.mid_order_id', $id)
			->orderBy('donasi.guest_id', 'DESC')
			->first();
		}else{
			$data = Program::select('program.id as programid','programlanguage.judul','donasi.*','users.nama_lengkap')
			->join('programlanguage', 'programlanguage.id_program', '=', 'program.id')
			->leftjoin('category', 'category.id', '=', 'program.id_category')
			->leftjoin('donasi_detail', 'donasi_detail.program_id', '=', 'program.id')
			->leftjoin('donasi', 'donasi.id', '=', 'donasi_detail.donasi_id')
			->leftjoin('users', 'users.id', '=', 'donasi.user_id')
			->where('programlanguage.id_language', $id_lang)
			->where('donasi.mid_order_id', $id)
			->orderBy('donasi.guest_id', 'DESC')
			->first();
		}

		return response()->json($data);
	}
}
