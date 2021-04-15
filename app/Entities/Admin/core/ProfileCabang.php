<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class ProfileCabang extends Model
{
    protected $table = 'profile_cabang';
    protected $fillable = [
        'name','address','is_active','deleted_at'
    ];
    
}
