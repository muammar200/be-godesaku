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
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'images' => $this->images->map(function ($image) {
                return [
                    url('storage/images/travel_articles/' . $image->image),
                ];
            }),
            'videos' => $this->videos->map(function ($video) {
                return [
                    url('storage/videos/travel_articles/' . $video->video),
                ];
            }),
        ];
    }
}
