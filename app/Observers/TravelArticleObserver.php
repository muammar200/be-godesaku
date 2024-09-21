<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\TravelArticle;

class TravelArticleObserver
{
    public function creating(TravelArticle $travel_article): void
    {
        $travel_article->slug = str()->slug($travel_article->title) . '-' . Str::random(6);
    }

    public function updating(TravelArticle $travel_article): void
    {
        if ($travel_article->isDirty('title')) {
            $travel_article->slug = str()->slug($travel_article->title) . '-' . Str::random(6);
        }
    }
}
