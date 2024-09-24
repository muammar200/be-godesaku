<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelArticleVideo extends Model
{
    use HasFactory;

    protected $table = 'travel_article_videos';

    protected $fillable = [
        'travel_article_id',
        'video',
    ];

    public function travel_articles()
    {
        return $this->belongsTo(TravelArticle::class);
    }
}
