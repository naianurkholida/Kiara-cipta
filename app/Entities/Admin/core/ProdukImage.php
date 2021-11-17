<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    protected $table = 'produk_image';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
