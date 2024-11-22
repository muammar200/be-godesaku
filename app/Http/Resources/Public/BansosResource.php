<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BansosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_bantuan' => $this->name,
            'keterangan' => $this->description,
            'icon' => url('storage/images/bansos/' . $this->icon),
            'jumlah_penerima' => $this->bansos_receivers_count . ' Jiwa',
        ];
    }
}
