<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\AdminTablesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminTablesSeeder::class,
            AdminMenuSeeder::class,
        ]);
    }
}
