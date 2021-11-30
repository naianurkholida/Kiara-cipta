<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Posting;
use App\Entities\Admin\core\PostingLanguage;
use App\Entities\Admin\core\Parameter;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Posting::where('id_category', 51)->get();

        return view('frontend.blog', compact('data'));
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
        $facebook  = Parameter::where('key', 'facebook')->first();
        $instagram = Parameter::where('key', 'instagram')->first();
        $twitter   = Parameter::where('key', 'twitter')->first();
        $whatsapp  = Parameter::where('key', 'whatsapp')->first();
        $email     = Parameter::where('key', 'email')->first();

        $dataLanguage = PostingLanguage::where('seo', $id)->firstOrFail();

        $data = Posting::findOrFail($dataLanguage->id_posting);

        return view('frontend.blog-detail', compact('data', 'facebook','instagram','twitter','whatsapp','email'));
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
