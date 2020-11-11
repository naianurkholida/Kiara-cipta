<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Language;

class CheckPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $language = Language::first()->id;

        $locale = Session::get('locale');

        if ($locale == NULL) {
            $locale = Session::put('locale', $language);
        }
    }

    public function index(Request $request)
    {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, 'http://103.11.134.45:8087/customer/?id='.$request->no_hp);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);

        $output = json_decode($output);
        $data   = $output[0];

        $chs = curl_init(); 
        curl_setopt($chs, CURLOPT_URL, 'http://103.11.134.45:8087/CustPoint/?id='.$data[0]);
        curl_setopt($chs, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1); 
        $outputs = curl_exec($chs); 
        curl_close($chs);

        $history = json_decode($outputs);

        $no_hp = $request->no_hp;

        return view('frontend.check_point', compact('data', 'history', 'no_hp'));
    }

    public function report($idTrx, $no_hp)
    {
        $chs = curl_init(); 
        curl_setopt($chs, CURLOPT_URL, 'http://103.11.134.45:8087/CustPoint/?id='.$idTrx);
        curl_setopt($chs, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1); 
        $outputs = curl_exec($chs); 
        curl_close($chs);

        $history = json_decode($outputs);

        return view('frontend.check_point_report', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
