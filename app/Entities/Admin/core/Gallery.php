<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Entities\Admin\core\Category;

class Gallery extends Model implements HasMedia
{
	protected $table = 'gallery';
	protected $primaryKey = 'id';
	protected $fillable = [
        'id_category',
        'is_created',
        'deleted_at',
        'embed',
        'image'
    ];
    
    use HasMediaTrait;

    public function category () {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }
}
