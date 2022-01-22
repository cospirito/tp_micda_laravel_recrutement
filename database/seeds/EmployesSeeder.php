<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployesSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fg = new Faker\Generator();
        $fg->addProvider(new Faker\Provider\fr_FR\Person($fg));
        $faker = Faker\Factory::create();

        DB::table('employes')->insert([
            'nom' => $faker->name,
            'tel' => $faker->phoneNumber,
            'email_verifier_a' => now(),
            'email' => $faker->unique()->safeEmail,
            'pwd' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'cv' => $faker->url,
        ]);
    }
}
