<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Entities\Admin\core\PostingLanguage;
use Illuminate\Support\Facades\Session;

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
        return $this->hasOne('App\Entities\Admin\core\Category','id','id_category');
    }

    public function getPostingLanguage()
    {
        return $this->hasOne(PostingLanguage::class, 'id_posting', 'id')->where('id_language', Session::get('locale'));
    }
}
