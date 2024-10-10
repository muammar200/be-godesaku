<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama' => $this->name,
            'slug' => $this->slug,
            'deskripsi' => $this->description,
            'rate' => $this->rate,
            'terjual' => $this->sold_quantity,
            'harga' => $this->price == floor($this->price)
                ? 'Rp. ' . number_format($this->price, 0, ',', '.') // Jika tidak ada desimal
                : 'Rp. ' . number_format($this->price, 2, ',', '.'), // Jika ada desimal
                'kontak_wa' => $this->whatsapp_contact,
            'gambar' => url('storage/images/products/' . $this->image),
        ];
    }
}
