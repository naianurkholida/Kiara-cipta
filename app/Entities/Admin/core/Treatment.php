<?php

namespace App\Entities\Admin\core;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Entities\Admin\core\TreatmentLanguage;

class Treatment extends Model implements HasMedia
{
	protected $table = 'treatment';
	protected $primaryKey = 'id';
	protected $fillable = [
        'id_category',
        'image',
        'is_created',
        'deleted_at'
    ];
    
    use HasMediaTrait;

    public function getTreatmentLanguage()
    {
        if(session::get('locale')){
            return $this->hasOne(TreatmentLanguage::class, 'id_treatment', 'id')->where('id_language', Session::get('locale'));
        }else{
            return $this->hasOne(TreatmentLanguage::class, 'id_treatment', 'id')->where('id_language', 1);
        }
    }
}
