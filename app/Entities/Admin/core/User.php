<?php

namespace App\Entities\Admin\core;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $table = 'users';
}
