<?php

namespace App\Entities\FrontPage;

use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    protected $table = 'forgot_password';
    protected $primaryKey = 'token';
}
