<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangays extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id', 'province_id', 'municipality_id', 'barangay_id', 'name',
    ];
}
