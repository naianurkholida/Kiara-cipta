<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class PostingLanguage extends Model
{
    protected $table = 'posting_language';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','id_posting','id_language',
        'judul', 'content'
    ];

    public function posting()
    {
        return $this->hasOne('App\Entities\Admin\core\Posting','id','id_posing');
    }
}
