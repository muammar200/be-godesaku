<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaritalStatus extends Model
{
    use HasFactory;

    // protected $table = ['marital_statuses'];

    // public function marriageDivorces()
    // {
    //     return $this->hasMany(MarriageDivorce::class);
    // }
}
