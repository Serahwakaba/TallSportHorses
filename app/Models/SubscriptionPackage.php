<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionPackage extends Model
{
    use HasFactory;

    protected $casts = [
        'features' => 'array',
    ];

    protected $fillable = [
        'title',
        'description',
        'price',
        'features',
    ];

    public function subscribers()
    {
        return $this->hasMany(Subscription::class);
    }
}
