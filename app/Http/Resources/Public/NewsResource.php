<?php

namespace App\Http\Resources\Public;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
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
                    url('storage/images/news/' . $image->image),
                ];
            }),
            'day_published' => Carbon::parse($this->created_at)->locale('id')->translatedFormat('l'),
            'published' => Carbon::parse($this->created_at)->diffInHours() >= 24
                ? Carbon::parse($this->created_at)->locale('id')->translatedFormat('j F Y')
                : Carbon::parse($this->created_at)->locale('id')->diffForHumans(),
        ];
    }
}
