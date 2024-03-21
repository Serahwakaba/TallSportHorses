<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdPromotionAddons extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'days_to_expiry',
        'key',
    ];
}
