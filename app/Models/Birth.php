<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Birth extends Model
{
    use HasFactory;

    public function master_population(): HasOne
    {
        return $this->hasOne(MasterPopulation::class);
    }
}
