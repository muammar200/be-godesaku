<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;

    protected $table = 'general_informations';

    protected $fillable = [
        'village_name',
        'subdistrict_name',
        'district_name',
        'province_name',
        'latitude_coordinates',
        'longitude_coordinates',
        'profile_summary',
        'area_map',
        'vision',
        'mission',
        'history',
        'village_logo',
        'government_structure',
        'organization_structure',
    ];
}
