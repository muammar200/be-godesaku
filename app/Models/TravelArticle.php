<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\TravelArticleObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(TravelArticleObserver::class)]
class TravelArticle extends Model
{
    use HasFactory;

    protected $table = 'travel_articles';

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function images()
    {
        return $this->hasMany(TravelArticleImage::class);
    }

    public function videos()
    {
        return $this->hasMany(TravelArticleVideo::class);
    }

    protected $with = ['images', 'videos'];
}
