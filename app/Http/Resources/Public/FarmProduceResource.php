<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FarmProduceResource extends JsonResource
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
            'jumlah' => $this->quantity == floor($this->quantity)
            ? number_format($this->quantity, 0, ',', '.') . ' ' . $this->production_unit
            : number_format($this->quantity, 2, ',', '.') . ' ' . $this->production_unit,
            'icon' => url('storage/images/farms/' . $this->icon),
        ];
    }

}
