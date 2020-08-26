<?php

namespace App\Entities\Admin\core;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Entities\Admin\core\ProdukLanguage;
use App\Entities\Admin\core\Category;

class Produk extends Model implements HasMedia
{
	protected $table = 'produk';
	protected $primaryKey = 'id';
	protected $fillable = [
        'id_category',
        'is_created',
        'deleted_at'
    ];
    
    use HasMediaTrait;

    public function getProdukLanguage()
    {
        if(Session::get('locale') != null){
            return $this->hasOne(ProdukLanguage::class, 'id_produk', 'id')->where('id_language', Session::get('locale'));
        }else{
            return $this->hasOne(ProdukLanguage::class, 'id_produk', 'id')->where('id_language', 1);
        }
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }
}
