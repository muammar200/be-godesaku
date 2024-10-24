<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutlayDesaResource extends JsonResource
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
            'id' => self::$sequence_id,
            'name' => $this->removePembiayaan($this->name),
            'total' => $this->formatAmount($this->total_amount),
        ];
    }

    private function removePembiayaan(string $name): string
    {
        return trim(str_replace(' Pembiayaan', '', $name));
    }

    private function formatAmount($amount)
    {
        if (intval($amount) == $amount) {
            return (float) $amount;
        }

        return (float) $amount;
    }
}
