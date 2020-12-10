<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class BestSellerIcon extends Model
{
    protected $table = 'best_seller_icon';

    public function produk()
    {
    	return $this->hasOne('App\Entities\Admin\core\Produk', 'id', 'product_id');
    }
}
