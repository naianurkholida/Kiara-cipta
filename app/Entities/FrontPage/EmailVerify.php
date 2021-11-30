<?php

namespace App\Entities\FrontPage;

use Illuminate\Database\Eloquent\Model;

class EmailVerify extends Model
{
    protected $table = 'email_verify';
    protected $primaryKey = 'token';
}
