<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'invoice_type',
        'total',
        'discount_total',
        'items',
        'tax_rate',
        'paid',
        'paid_at',
        'pay_until_days',

        'invoiceable_id',
        'invoiceable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoiceable(): MorphTo
    {
        return $this->morphTo();
    }
}
