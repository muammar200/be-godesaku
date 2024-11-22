<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BansosReceiver extends Model
{
    use HasFactory;

    public function masterPopulation(): BelongsTo
    {
        return $this->belongsTo(MasterPopulation::class);
    }

    public function bansos(): BelongsTo
    {
        return $this->belongsTo(Bansos::class);
    }
}
