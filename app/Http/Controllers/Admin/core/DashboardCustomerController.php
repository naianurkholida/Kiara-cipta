<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\Settings;
use DB;
use Image;
use File;

class DashboardCustomerController extends Controller
{
    public function __construct()
    {
        $this->path =  'assets/admin/assets/media/img';
    }

    public function index()
    {
        $data = Settings::all();
        return view('admin.core.setup.customer.index', compact('data'));
    }

    public function insert(Request $request)
    {
        $path = $this->path;
        return view('admin.core.setup.customer.insert', compact('path'));
    }

    public function store(Request $request)
    {
        $settings = new Settings;
        $settings->key = Str::slug($request->title);
        $settings->url = $request->url;
        $settings->name = $request->title;
        $settings->description = $request->description;

        if($request->file('file') != null){

            $file = $request->file('file');

            if (!File::isDirectory($this->path)) {
                File::makeDirectory($this->path);
            }

            $fileName = Str::slug($request->title).'_'.uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->save($this->path.'/'. $fileName);
            $settings->icon = $fileName;
        }
        $settings->jenis = $request->jenis;
        $settings->save();  

        return redirect('/dashboard_customer')->with('success', 'Data berhasil di tambahkan.');
    }

    public function edit($id)
    {
        $data = Settings::findOrFail($id);

        return view('admin.core.setup.customer.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $settings = Settings::findOrFail($id);
        $settings->key = Str::slug($request->title);
        $settings->url = $request->url;
        $settings->name = $request->title;
        $settings->description = $request->description;

        if($request->file('file') != null){

            $file = $request->file('file');

            if (!File::isDirectory($this->path)) {
                File::makeDirectory($this->path);
            }

            $fileName = Str::slug($request->title).'_'.uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->save($this->path.'/'. $fileName);
            $settings->icon = $fileName;
        }
        $settings->jenis = $request->jenis;
        $settings->save();  

        return redirect('/dashboard_customer')->with('success', 'Data berhasil di ubah.');
    }

    public function delete($id)
    {
        Settings::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil di hapus.');
    }
}
