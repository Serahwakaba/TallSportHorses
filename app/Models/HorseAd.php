<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorseAd extends Model
{
    use HasFactory;

    protected $casts = [
        'description' => 'array',
        'family_tree' => 'array',
        'video_link' => 'array',
        'images' => 'array',
        'achievements' => 'array',
        'publish_addons' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'category',
        'predicate',
        'tribe',
        'age',
        'level',
        'gender',
        'studbook',
        'color',
        'withers_length',
        'price',
        'poa',
        'xray_approved',
        'xray_approved_date',
        'clinical_proven',
        'clinical_proven_date',
        'description',
        'family_tree',
        'video_link',
        'images',
        'achievements',
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
