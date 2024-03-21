<?php

namespace App\Models;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_status',

        'user_id',
        'subscription_id'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
