<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Admin\core\Gallery;

class Category extends Model
{
    protected $table = 'category';

    public function getGallery()
    {
        return $this->hasMany(Gallery::class, 'id_category', 'id')->where('deleted_at', NULL);
    }
}
