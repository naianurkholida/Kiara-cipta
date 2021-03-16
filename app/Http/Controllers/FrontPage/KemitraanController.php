<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\PostingLanguage;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\Language;

class KemitraanController extends Controller
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

    public function index()
    {
        $data = '';
        return view('frontend.kemitraan', compact('data'));
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
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, 'http://103.11.134.45:8087/reseller/?name='.$request->name.'&email='.$request->email.'&hp='.$request->no_hp.'&city='.$request->city);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);

        $data = 'Data Berhasil di Kirim';
        return redirect()->back()->with('message', $data);
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
