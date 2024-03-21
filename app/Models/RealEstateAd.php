<?php

namespace App\Models;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealEstateAd extends Model
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
        'price',
        'poa',
        'country',
        'province',
        'address',
        'zip_code',
        'place',

        'year_of_construction',
        'size',
        'amenities',

        'description',
        'video_link',
        'images',
        'label',
        'user_id',

        'published',
        'publish_date',
        'expired',
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
