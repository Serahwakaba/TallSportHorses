<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_interval',
        'user_id',
        'active',
        'custom_price',
        'subscription_package_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription_package()
    {
        return $this->belongsTo(SubscriptionPackage::class);
    }

    public function subscriptionPayments()
    {
        return $this->hasMany(SubscriptionPayments::class);
    }
}
