<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RevenueDesaResource extends JsonResource
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
            'nama' => $this->name, 
            'jumlah' => $this->formatAmount($this->total_amount), 
        ];
    }

    private function formatAmount($amount)
    {
        if (intval($amount) == $amount) {
            return (string) intval($amount);
        }

        return (string) $amount;
    }
}
