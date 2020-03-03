<?php

namespace App\Http\Controllers\Admin\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entities\Admin\core\MenuAccess;
use App\Entities\Admin\core\Bank;
use File;
use Image;

class UploadImageBase64 extends Controller
{
    public function __construct()
    {
        $this->path =  'assets/admin/assets/media/base64_to_image';
    }

	public function uploadImage(Request $request){
        $file = $request->file('image');

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }

        $fileName = 'Icon'.'_'.uniqid().'.'.$file->getClientOriginalExtension();
        Image::make($file)->save($this->path.'/'. $fileName);

        return response()->json(url('/').'/'.$this->path.'/'.$fileName);
    }

    public function deleteImage(Request $request){
        $image = str_replace(url('/').'/','', $request->src);

        File::delete($image);
    }
}
