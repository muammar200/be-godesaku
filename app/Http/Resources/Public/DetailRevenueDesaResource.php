<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailRevenueDesaResource extends JsonResource
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
            'rincian' => $this->detailApbDesa->map(function ($detail){
                return $detail->name;
            }),
            'jumlah' => $this->detailApbDesa->map(function ($detail){
                return $this->formatAmount($detail->amount);
            }),
            'title' => $this->name,
            'total' => $this->formatAmount($this->detailApbDesa->sum('amount')),
        ];
    }

    private function formatAmount($amount)
    {
        // Convert the amount to a string with two decimal places
        $formattedAmount = number_format($amount, 2, ',', '.');

        // Remove the decimal part if it ends with ,00
        if (substr($formattedAmount, -3) == ',00') {
            return number_format($amount, 0, ',', '.');
        }

        return $formattedAmount;
    }
}
