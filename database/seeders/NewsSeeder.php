<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::factory(15)->create()->each(function ($news) {
            for ($i = 0; $i < 3; $i++) {
                NewsImage::create([
                    'news_id' => $news->id,
                    'image' => 'dummy-image-' . ($i + 1) . '.jpg',
                ]);
            }
        });
    }
}
