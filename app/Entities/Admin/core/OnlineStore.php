<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class OnlineStore extends Model
{
    protected $table = "online_store";
    protected $fillable = [
        'icon','name','link','deleted_at'
    ];
}
