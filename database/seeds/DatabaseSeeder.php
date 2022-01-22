<?php

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
        // $this->call(UsersTableSeeder::class);
        for ($i = 1; $i <= 100; $i++) {
            // $this->call(EmployesSeeder::class);
            $this->call(OffreEmploisSeeder::class);
        }
    }
}
