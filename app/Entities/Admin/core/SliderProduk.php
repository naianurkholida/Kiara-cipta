<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Admin\core\SliderProdukLanguage;

class SliderProduk extends Model
{
    protected $table = 'slider_produk';
    protected $primaryKey = 'id';

    public function descriptionJoin()
    {
        return $this->hasOne(SliderProdukLanguage::class, 'id_slider_produk', 'id');
    }
}
