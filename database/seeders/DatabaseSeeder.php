<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Companie;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Companie::factory(10)->create();
        Employee::factory(10)->create();
    }
}
