<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class DokterLanguage extends Model
{
    protected $table = 'dokterlanguage';
    protected $primaryKey = 'id';
	protected $fillable = [
		'id',
        'id_dokter',
        'seo',
		'id_language',
		'deskripsi'
	];
}
