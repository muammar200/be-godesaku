<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FarmProduceResource extends JsonResource
{
    public static $sequence_id = 0;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        self::$sequence_id++;

        return [
            // 'id' => $this->id, 
            'id' => self::$sequence_id,
            'nama' => $this->name,
            'jumlah' => $this->quantity == floor($this->quantity)
                ? number_format($this->quantity, 0, ',', '.')
                : number_format($this->quantity, 2, ',', '.'),
            'keterangan' => $this->production_unit,
            'icon' => url('storage/images/farms/' . $this->icon),
        ];
    }
}
