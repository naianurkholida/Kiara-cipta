<?php

namespace App\Entities\Admin\core;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Admin\core\MenuFrontPageLanguage;

class MenuFrontPage extends Model
{
    protected $table = 'menu_front_page';

    public function getMenuFrontPageLanguage()
    {
        return $this->hasOne(MenuFrontPageLanguage::class, 'id_menu_front_page', 'id')->where('id_language', Session::get('locale'));
    }

    public function getMenuFrontPageChild()
    {
        return $this->hasMany(MenuFrontPage::class, 'id', 'id_sub_menu');
    }
}
