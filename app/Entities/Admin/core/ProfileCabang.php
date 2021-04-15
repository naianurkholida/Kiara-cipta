<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Admin\core\ProfileCabangDetail;

class ProfileCabang extends Model
{
    protected $table = 'profile_cabang';
    protected $fillable = [
        'name','address','link','is_active','deleted_at'
    ];
    
    public function detail()
    {
        return $this->hasMany(ProfileCabangDetail::class, 'id_profile_cabang', 'id');
    }
}
