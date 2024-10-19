<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailRevenueDesaResource extends JsonResource
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
            'nama_pendapatan' => $this->name,
            'total' => 'Rp.' . $this->formatAmount($this->detailApbDesa->sum('amount')),
            'rincian_pendapatan' => $this->detailApbDesa->map(function ($detail) {
                return [
                    'id' => $detail->id,
                    'nama' => $detail->name,
                    'jumlah' => 'Rp.' .  $this->formatAmount($detail->amount),
                ];
            }),
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
