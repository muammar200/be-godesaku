<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelArticleImage extends Model
{
    use HasFactory;

    protected $table = 'travel_article_images';

    protected $fillable = [
        'travel_article_id',
        'image',
    ];

    public function travel_articles()
    {
        return $this->belongsTo(TravelArticle::class);
    }
}
