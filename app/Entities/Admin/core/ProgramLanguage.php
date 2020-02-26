<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class ProgramLanguage extends Model
{
    protected $table = 'programlanguage';
    protected $primaryKey = 'id';
	protected $fillable = [
		'id',
		'id_program',
		'id_language',
		'judul',
		'deskripsi'
	];
}
