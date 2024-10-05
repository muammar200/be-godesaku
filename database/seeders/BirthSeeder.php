<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BirthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Generate 20 unique no_kk
        $noKkList = [];
        for ($i = 0; $i < 20; $i++) {
            $noKkList[] = $faker->numerify('####-####-####');
        }

        for ($i = 1; $i <= 100; $i++) {
            DB::table('births')->insert([
                'master_pupulation_id' => $i,  
                'pob' => $faker->city,
                'dob' => '2022-03-12',
                'tob' => $faker->time,
                'time_id' => rand(1, 3),  
                'child_order' => rand(1, 10),
                'birth_type_id' => 1,  
                'birth_attendant_id' => 1,  
                'baby_weight' => $faker->randomFloat(2, 2, 5),  
                'baby_length' => $faker->randomFloat(2, 40, 60),  
                'type_of_birth_certificate_id' => 1,  
                'birth_certificate_number' => $faker->numerify('BC#######'),
                'birth_certificate_date' => $faker->date,
                'no_kk' => $noKkList[array_rand($noKkList)],  
                'family_position_id' => rand(1, 11),  
                'mother_nik' => $faker->numerify('#########'),
                'mother_name' => $faker->name('female'),
                'father_nik' => $faker->numerify('#########'),
                'father_name' => $faker->name('male'),
            ]);
        }
    }
}
