<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\Language;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Treatment;
use App\Entities\FrontPage\Pengunjung;
use App\Entities\Admin\core\Produk;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\MenuFrontPage;
use App\Entities\Admin\core\MenuFrontPageLanguage;
use GuzzleHttp\Client;
use DB;
use Image;
use File;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
        $this->view = 'frontend.home';

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

        //Definisi PATH Foto
		$this->path =  'assets/admin/assets/media/img';
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view($this->view);
    }

    public function satisfied(Request $request) {
        return view('frontend.satisfied');
    }

    public function unsatisfied(Request $request, $trx_no) {
        $method = $request->method();

        if($method == 'GET'){
            $msg = '';
            $msg_error = '';
            return view('frontend.unsatisfied', compact('trx_no','msg','msg_error'));
        }else{
            $trx_no = $request->trx_no;
            $reason = $request->reason;
            $file = $request->file('image');
    
            if ($file) {
                $fileName = 'Reason'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                Image::make($file)->save($this->path.'/'. $fileName);
                
                // $client = new Client();
                // $response = $client->request('POST', 'http://103.11.135.246:1507/Unsatisfied?no_trx='.str_replace(',','', $trx_no).'&image=https://derma-express.com/'.$this->path.'/'.$fileName.'&reason='.$reason);
        
                // $res = $response->getBody();
                // $data = json_decode($res);
                
                // $msg = 'Pesan anda berhasil terkirim, Terimakasih DexPeople';
                // $msg_error = '';
                // return view('frontend.unsatisfied', compact('trx_no','msg','msg_error'));

                return redirect('http://103.11.135.246:2310/apex/f?p=887:4:3196839729598:::4:P4_TRX_NO,P4_REASON,P4_LINK_IMG:'.str_replace(',','', $trx_no).'/'.$fileName.'/'.$reason);

            }else{
                $msg = '';
                $msg_error = 'Pesan anda gagal terkirim';
                return view('frontend.unsatisfied', compact('trx_no','msg','msg_error'));
            }
        }
    }

    //not use
    public function unsatisfiedStore(Request $request) {
        $trx_no = $request->trx_no;
        $reason = $request->reason;
		$file = $request->file('image');

		if ($file) {
			$fileName = 'Reason'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
			Image::make($file)->save($this->path.'/'. $fileName);
		}
        
        $msg = 'Pesan anda berhasil terkirim, Terimakasih DexPeople';
        return view('frontend.unsatisfied', compact('trx_no','msg'));
    }
    //end not use

    public function freeVoucher() {
        return view('frontend.free-voucher');
    }

    public function jurnalListJson()
    {
        $data = Posting::with('getPostingLanguage')
                ->whereIn('id_category', [58,51])
                ->get();

        return response()->json($data);
    }

    public function produkListJson()
    {
        $data = Produk::with('getProdukLanguage')->where('deleted_at', null)->get();
    
        return response()->json($data);
    }

    public function kategoriProdukListJson () 
    {
		$data = Category::where('id_parent',36)
						->where('deleted_at', null)
						->orderBy('order_num', 'asc')
						->get();
    
        return response()->json($data);
    }

    public function treatmentListJson()
    {
        $data = Treatment::with('getTreatmentLanguage')->where('deleted_at', null)->get();

        return response()->json($data);
    }

    public function getSubMenuById()
    {
        $data = MenuFrontPage::with('getMenuFrontPageLanguage')->whereIn('id_sub_menu', [19,20,21,22,23,24])->get();

        return response()->json($data);
    }
}
