<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_menu')->insert([
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => 'Клиенты',
                'icon' => 'fa-users',
                'uri' => 'telegram-users',
            ]
        ]);
    }
}
