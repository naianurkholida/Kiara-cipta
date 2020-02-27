<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Admin\core\Category;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Sosmed extends Model implements HasMedia
{
	protected $table = 'sosmed';
	protected $primaryKey = 'id';
	protected $fillable = [
        'id_category',
        'is_created',
        'deleted_at',
        'link'
    ];
    
    use HasMediaTrait;

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }
}
