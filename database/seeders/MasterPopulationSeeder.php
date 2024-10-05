<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPopulation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class MasterPopulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 

        for ($i = 0; $i < 100; $i++) {
            MasterPopulation::create([
                'nik' => $faker->numerify('################'), // 16 digit NIK
                'full_name' => $faker->name,
                'gender_id' => $faker->numberBetween(1, 2), 
                'religion_id' => $faker->numberBetween(1, 6), 
                'blood_type_id' => $faker->numberBetween(1, 4), 
                'education_id' => $faker->numberBetween(1, 10), 
                'profession_id' => $faker->numberBetween(1, 99),
                'phone_number' => $faker->optional()->phoneNumber,
                'home_address' => $faker->streetAddress,
                'house_number' => $faker->buildingNumber,
                'rt' => $faker->numberBetween(1, 10),
                'rw' => $faker->numberBetween(1, 10),
                'dusun_id' => $faker->numberBetween(1, 2), 
                'can_read_id' => $faker->optional()->numberBetween(1, 2), 
                'civic_id' => $faker->numberBetween(1, 2), 
                'nationality' => 'Indonesia', 
                'entry_type_id' => 1, 
                'exit_type_id' => 1, 
            ]);
        }
    }
}
