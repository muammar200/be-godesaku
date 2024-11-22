<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterPopulation extends Model
{
    use HasFactory;

    protected $table = 'master_populations';

    public function birth(): HasOne
    {
        return $this->hasOne(Birth::class);
    }

    public function blood_type(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    public function can_read(): BelongsTo
    {
        return $this->belongsTo(CanRead::class);
    }

    public function civic(): BelongsTo
    {
        return $this->belongsTo(Civic::class);
    }

    public function dusun(): BelongsTo
    {
        return $this->belongsTo(Dusun::class);
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }

    public function entry_type(): BelongsTo
    {
        return $this->belongsTo(EntryType::class);
    }

    public function exit_type(): BelongsTo
    {
        return $this->belongsTo(ExitType::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }

    public function marriageDivorces()
    {
        return $this->hasMany(MarriageDivorce::class);
    }

    public function bansosReceivers(): HasMany
    {
        return $this->hasMany(BansosReceiver::class);
    }
    
}
