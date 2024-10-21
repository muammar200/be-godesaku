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
            'id' => $this->id, // Ini harus mengambil id dari farm_produces
            'nama' => $this->name,
            'jumlah' => $this->quantity == floor($this->quantity)
                ? number_format($this->quantity, 0, ',', '.')
                : number_format($this->quantity, 2, ',', '.'),
            'keterangan' => $this->production_unit,
            'icon' => url('storage/images/farms/' . $this->icon),
        ];
    }
}
