<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarriageDivorce extends Model
{
    use HasFactory;

    protected $table = 'marriage_divorce';

    public function maritalStatus()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_id', 'id');
    }

    public function masterPopulation()
    {
        return $this->belongsTo(MasterPopulation::class);
    }
}
