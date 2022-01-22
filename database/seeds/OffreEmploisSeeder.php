<?php

use Illuminate\Database\Seeder;

class OffreEmploisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fg = new Faker\Generator();
        $fg->addProvider(new Faker\Provider\fr_FR\Company($fg));
        $faker = Faker\Factory::create();

        DB::table('offre_emplois')->insert([
            'titre' => $faker->jobTitle,
            'description' => $faker->jobTitle." : ".$faker->text,
            'etat' => 'non_expiré',
       ]);
        
    }
}
