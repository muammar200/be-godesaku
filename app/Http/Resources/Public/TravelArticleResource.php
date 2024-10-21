<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $images = $this->images->map(function ($image) {
            return [
                'type' => 'image',
                'url' => url('storage/images/travel_articles/' . $image->image),
            ];
        });

        $videos = $this->videos->map(function ($video) {
            return [
                'type' => 'video',
                'url' => url('storage/videos/travel_articles/' . $video->video),
            ];
        });
        
        $assets = $images->concat($videos)->values();

        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'assets' => $assets,
        ];
    }
}
