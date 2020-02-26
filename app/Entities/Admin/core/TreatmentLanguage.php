<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class TreatmentLanguage extends Model
{
    protected $table = 'treatmentlanguage';
    protected $primaryKey = 'id';
	protected $fillable = [
		'id',
        'id_treatment',
        'seo',
		'id_language',
		'judul',
		'deskripsi'
	];
}
