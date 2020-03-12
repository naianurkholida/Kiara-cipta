<?php

namespace App\Http\Controllers\FrontPage;

use Illuminate\Http\Request;
use App\Entities\Admin\core\Category;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Treatment;
use App\Entities\Admin\core\TreatmentLanguage;
use App\Entities\Admin\core\Parameter;

class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = Category::where('category', str_replace('-', ' ', $id))->first();

        $data = Treatment::where('id_category', $category->id)->get();
        // $data = Treatment::where('id_category', $id)->get();

        return view('frontend.treatments', compact('data'));
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
        $dataLanguage = TreatmentLanguage::where('seo', $id)->firstOrFail();

        $data = Treatment::findOrFail($dataLanguage->id_treatment);

        return view('frontend.treatments-detail', compact('data'));
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
