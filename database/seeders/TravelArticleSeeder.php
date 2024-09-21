<?php

namespace Database\Seeders;

use App\Models\TravelArticle;
use App\Models\TravelArticleImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TravelArticle::factory(15)->create()->each(function ($travel_article) {
            for ($i = 0; $i < 3; $i++) {
                TravelArticleImage::create([
                    'travel_article_id' => $travel_article->id,
                    'image' => 'dummy-image-' . ($i + 1) . '.jpg',
                ]);
            }
        });
    }
}
