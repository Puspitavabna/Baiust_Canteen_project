<?php

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();
        $this->command->info('----- Running Role Type Data Seeder -----');
        $this->call(RoleTypeSeeder::class);
        $this->call(DepartmentSeeder::class);

        $this->command->info('----- Seeding Completed -----');

        Model::reguard();

    }
}
