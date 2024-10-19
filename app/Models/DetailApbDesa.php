<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailApbDesa extends Model
{
    use HasFactory;

    protected $table = 'details_apb_desa';

    protected $fillable = ['name_apb_desa_id', 'name', 'amount', 'year'];

    public function nameApbDesa(): BelongsTo
    {
        return $this->belongsTo(NameApbDesa::class);
    }
}
