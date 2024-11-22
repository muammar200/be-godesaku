<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityImplementer extends Model
{
    use HasFactory;

    protected $fillable = [
        'idm_indicator_id',
        'pusat',
        'provinsi',
        'kab',
        'desa',
        'csr',
        'others'
    ];

    public function idmIndicator(): BelongsTo
    {
        return $this->belongsTo(IdmIndicator::class);
    }
}
