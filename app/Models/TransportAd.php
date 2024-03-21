<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportAd extends Model
{
    use HasFactory;

    protected $casts = [
        'description' => 'array',
        'video_link' => 'array',
        'images' => 'array',
        'publish_addons' => 'array',
    ];

    protected $fillable = [
        'title',
        'category',
        'yom',
        'brand',
        'carry_capacity',
        'color',
        'material',
        'driving_license',
        'price',
        'poa',
        'description',
        'video_link',
        'images',
        'label',
        'user_id',

        'published',
        'expired',
        'publish_date',
        'publish_package',
        'publish_addons',

        'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice(): MorphOne
    {
        return $this->morphOne(Invoice::class, 'invoiceable');
    }
}
