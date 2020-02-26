<?php

use Illuminate\Database\Seeder;

class MenuAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Admin\core\MdlMenuAccess::class, 1)->create();
    }
}
