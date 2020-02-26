<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Posting extends Model implements HasMedia
{
    protected $table = 'posting';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','id_category','status'
    ];

    use HasMediaTrait;

    public function category()
    {
        return $this->hasOne('App\Entities\Admin\core\category','id','id_category');
    }
}
