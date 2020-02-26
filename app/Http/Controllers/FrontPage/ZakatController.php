<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Veritrans\Midtrans;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Entities\Admin\modul\Guest;
use App\Entities\Admin\modul\Zakat;
use App\Entities\Admin\modul\ZakatDetail;

class ZakatController extends Controller
{
	public function __construct()
	{
		Midtrans::$serverKey = env('MIDTRANS_SERVER_KEY', '');
		Midtrans::$isProduction = env('MIDTRANS_PRODUCTION', false);
	}

	public function token() 
	{
		error_log('masuk ke snap token adri ajax');
		$midtrans = new Midtrans;
		$transaction_details = array(
			'order_id'       => uniqid(),
			'gross_amount'   => Input::get('jumlah_zakat')
		);
		
        // Populate items
		$items = [
			array(
				'id'            => 'zakat1',
				'price'         => Input::get('jumlah_zakat'),
				'quantity'      => 1,
				'name'          => Input::get('category_produk')
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

            //return redirect($vtweb_url);
			echo $snap_token;
		} 
		catch (Exception $e) 
		{   
			return $e->getMessage;
		}
	}

	public function finish(Request $request)
	{
		$result = $request->input('result_data');
		$result = json_decode($result);

		$zakat = Zakat::create([
			'user_id'           => $request->input('id'),
			'member_id'         => 0,
			'total_zakat'       => $request->input('donation'),
			'status'            => $result->transaction_status,
			'metode_pembayaran' => $result->payment_type,
			'batas_pembayaran'  => Null,
			'snap_token'        => $result->transaction_id,
			'mid_order_id'      => $result->order_id
		]);

		$zakat_detail = ZakatDetail::create([
			'zakat_id'      => $zakat->id,
			'program_id'    => Null,
			'akad_id'       => 0,
			'id_category'   => $request->input('category_id'),
			'nilai_zakat'   => $request->input('donation'),
			'komentar'      => ($request->input('komentar'))?$request->input('komentar'):'-',
			'anonim'        => ($request->input('anonim'))?$request->input('anonim'):0,
			'verifikasi'    => ($request->input('verifikasi'))?$request->input('verifikasi'):0,
		]);


		return redirect()->back();
	}
}
