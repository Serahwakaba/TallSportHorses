<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerAd extends Model
{
    use HasFactory;

    protected $casts = [
        'images' => 'array',
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
        'link',
        'position',

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
