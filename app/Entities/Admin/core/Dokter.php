<?php

namespace App\Entities\Admin\core;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Entities\Admin\core\Category;
use App\Entities\Admin\core\DokterLanguage;

class Dokter extends Model implements HasMedia
{
	protected $table = 'dokter';
	protected $primaryKey = 'id';
	protected $fillable = [
        'id_category',
        'is_created',
        'deleted_at',
        'name'
    ];
    
    use HasMediaTrait;

    public function getDokterLanguage()
    {
        return $this->hasOne(DokterLanguage::class, 'id_dokter', 'id')->where('id_language', Session::get('locale'));
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }
}
