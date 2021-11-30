<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class ProfileCabangDetail extends Model
{
    protected $table = 'profile_cabang_detail';
    protected $fillable = [
        'id_profile_cabang','type','value'
    ];
}
