<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Str;

class NewsObserver
{
    public function creating(News $news): void
    {
        $news->slug = str()->slug($news->title) . '-' . Str::random(6);

    }

    public function updating(News $news): void
    {
        if ($news->isDirty('title')) {
            $news->slug = str()->slug($news->title) . '-' . Str::random(6);
        }
    }

}
