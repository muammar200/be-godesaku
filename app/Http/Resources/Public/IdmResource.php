<?php

namespace App\Http\Resources\Public;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdmResource extends JsonResource
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
            'indikator' => $this->indicator,
            'skor' => $this->score,
            'keterangan' => $this->description,
            'kegiatan' => $this->activity,
            'nilai' => $this->grade,
            'pusat' => $this->activityImplementers->first()?->pusat,
            'provinsi' => $this->activityImplementers->first()?->provinsi,
            'kab' => $this->activityImplementers->first()?->kab,
            'desa' => $this->activityImplementers->first()?->desa,
            'csr' => $this->activityImplementers->first()?->csr,
            'lainnya' => $this->activityImplementers->first()?->others,
        ];
    }
}
