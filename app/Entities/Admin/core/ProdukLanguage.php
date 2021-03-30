<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;

class ProdukLanguage extends Model
{
    protected $table = 'produklanguage';
    protected $primaryKey = 'id';
	protected $fillable = [
		'id',
        'id_produk',
        'seo',
		'id_language',
		'judul',
		'deskripsi',
		'deleted_at'
	];
}
