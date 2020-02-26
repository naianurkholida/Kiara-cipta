<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Parameter;
use App\Entities\Admin\core\MenuAccess as MenuAccess;

class ParameterController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_bar = $this->top_bar();

        if(\Session::get('role_id') == '1'){
            $parameter = Parameter::where('parent', 0)->get();
        }else{
            $parameter = Parameter::where('parent', 0)->where('is_created', \Session::get('id'))->get();
        }

        $validasi = MenuAccess::select('*')
        ->leftjoin('menus', 'menus.id', '=', 'menu_access.menu_id')
        ->where('role_id', \Session::get('role_id'))
        ->where('menus.deleted_at', null)
        ->where('menus.id', 12)
        ->first();
        return view('admin.core.parameter.index', compact('top_bar', 'parameter', 'validasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $top_bar = $this->top_bar();
        $parameter = Parameter::where('parent', 0)->get();
        return view('admin.core.parameter.insert', compact('top_bar', 'parameter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameter = new Parameter;
        $parameter->key = $request->key;
        $parameter->judul = $request->judul;
        $parameter->value = $request->value;
        $parameter->parent = $request->parent;
        $parameter->is_created = \Session::get('id');
        $parameter->save();

        return redirect('parameter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $top_bar = $this->top_bar();
        $parameter = Parameter::find($id);
        $param = Parameter::where('parent', $id)->get();
        // dd($param);
        return view('admin.core.parameter.detail', compact('top_bar', 'parameter', 'param'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $top_bar = $this->top_bar();
        $parameter = Parameter::where('parent', 0)->where('id', '!=', $id)->get();
        $param = Parameter::find($id);
        // dd($parameter);
        return view('admin.core.parameter.edit', compact('top_bar', 'parameter', 'param'));
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
        $parameter = Parameter::find($id);
        $parameter->key = $request->key;
        $parameter->judul = $request->judul;
        $parameter->value = $request->value;
        $parameter->parent = $request->parent;
        $parameter->is_created = \Session::get('id');
        $parameter->save();

        return redirect('parameter');
    }
    
    public function update_detail(Request $request, $id)
    {
        $parameter = Parameter::find($id);
        $parameter->key = $request->key;
        $parameter->judul = $request->judul;
        $parameter->value = $request->value;
        $parameter->save();

        return redirect('parameter/detail/'.$parameter->parent);
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
