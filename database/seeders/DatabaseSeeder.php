<?php

namespace Database\Seeders;

use App\Models\BirthType;
use App\Models\CanRead;
use App\Models\Death;
use App\Models\Education;
use App\Models\FamilyPosition;
use App\Models\MaritalStatus;
use App\Models\MarriageDivorce;
use App\Models\MasterPopulation;
use App\Models\Profession;
use App\Models\Religion;
use App\Models\TravelArticle;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     NewsSeeder::class,
        // ]);
        // $this->call([
        //     TravelArticleSeeder::class,
        // ]);

        // related table master_populations
        // $this->call([
        //     BloodTypeSeeder::class,
        // ]);
        // $this->call([
        //     GenderSeeder::class,
        // ]);
        // $this->call([
        //     ReligionSeeder::class,
        // ]);
        // $this->call([
        //     EducationSeeder::class,
        // ]);
        // $this->call([
        //     ProfessionSeeder::class,
        // ]);
        // $this->call([
        //     DusunSeeder::class,
        // ]);
        // $this->call([
        //     CanReadSeeder::class,
        // ]);
        // $this->call([
        //     CivicSeeder::class,
        // ]);
        // $this->call([
        //     EntryTypeSeeder::class,
        // ]);
        // $this->call([
        //     ExitTypeSeeder::class,
        // ]);

        // table master_populations
        // $this->call([
        //     MasterPopulationSeeder::class,
        // ]);


        // related table births
        // $this->call([
        //     TimeSeeder::class,
        // ]);
        // $this->call([
        //     BirthTypeSeeder::class,
        // ]);
        // $this->call([
        //     BirthAttendantSeeder::class,
        // ]);
        // $this->call([
        //     TypeOfBirthCertificateSeeder::class,
        // ]);
        // $this->call([
        //     FamilyPositionSeeder::class,
        // ]);

        // $this->call([
        //     BirthSeeder::class,
        // ]);

        // $this->call([
        //     DeathSeeder::class,
        // ]);

        // table marriage_divorce
        // $this->call([
        //     MaritalStatusSeeder::class,
        // ]);
        // $this->call([
        //     MarriageDivorceSeeder::class,
        // ]);


        // $this->call([
        //     SliderSeeder::class,
        // ]);


        // $this->call([
        //     ProductionLevelsSeeder::class,
        // ]);
        // $this->call([
        //     FarmProduceSeeder::class,
        // ]);

        // $this->call([
        //     IdmInfoSeeder::class,
        // ]);
        // $this->call([
        //     IdmAnnualScoresSeeder::class,
        // ]);
        // $this->call([
        //     IdmIndicatorCategoriesSeeder::class,
        // ]);
        // $this->call([
        //     IdmIndicatorSeeder::class,
        // ]);
        // $this->call([
        //     ActivityImplementerSeeder::class,
        // ]);

        $this->call([
            BansosSeeder::class,
        ]);
        $this->call([
            BansosReceiverSeeder::class,
        ]);


    }
}
