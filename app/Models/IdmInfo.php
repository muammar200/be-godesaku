<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdmInfo extends Model
{
    use HasFactory;

    protected $table = 'idm_info';

    protected $fillable = ['year', 'status', 'total_score', 'target_status', 'minimum_score', 'increment', 'iks_score', 'ike_score', 'ikl_score'];
}
