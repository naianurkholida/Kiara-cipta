<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class ProdukSpecification extends Model
{
    protected $table = 'produk_specification';
    protected $fillable = [
        'id_produk', 'icon-light', 'icon-dark', 'specification', 'is_active'
    ];
}
