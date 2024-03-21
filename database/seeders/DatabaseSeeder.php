<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdPackage;
use App\Models\AdPromotionAddons;
use App\Models\SubscriptionPackage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public $packages = [['title' => 'Standard', 'copy' => 'Standard visibility', 'price' => 9.5, 'features' => ['180 days on Sporthorses']], ['title' => 'Plus', 'copy' => 'Higher visibility', 'price' => 29.5, 'features' => ['180 days on Sporthorses', 'Viewed up to 6 times more often', '7 days on the homepage of Sporthorses']], ['title' => 'Premium', 'copy' => 'Higher visibility + social media', 'price' => 49.5, 'features' => ['180 days on Sporthorses', 'Viewed up to 15 times more often', '7 days on the homepage of Sporthorses', 'Shown on our Facebook channel']]];

    public $addons = [
        [
            'title' => 'Standard Category',
            'key' => 'STANDARD_CATEGORY',
            'description' => 'Your ad visible on our websites',
            'price' => 0.0,
            'days_to_expiry' => 180,
        ],
        [
            'title' => 'Homepage Advert',
            'key' => 'HOMEPAGE_AD',
            'description' => 'Your ad visible on our websites',
            'price' => 0.0,
            'days_to_expiry' => 7,
        ],
        [
            'title' => 'Website Link',
            'key' => 'WEBSITE_LINK',
            'description' => 'Submit your site to your ad',
            'price' => 6.5,
            'days_to_expiry' => 180,
        ],
        [
            'title' => 'Label',
            'key' => 'LABEL',
            'description' => 'Add label to your ad',
            'price' => 3.95,
            'days_to_expiry' => 180,
        ],
        [
            'title' => 'Top Advert',
            'key' => 'TOP_AD',
            'description' => 'Your ad is at the top of Top adverts',
            'price' => 25.0,
            'days_to_expiry' => 7,
        ],
        [
            'title' => 'Facebook',
            'key' => 'FACEBOOK',
            'description' => 'Your advertisement is shown on our Facebook page',
            'price' => 25.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Instagram',
            'key' => 'INSTAGRAM',
            'description' => 'Your advertisement is shown on our Instagram page',
            'price' => 25.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Twitter',
            'key' => 'TWITTER',
            'description' => 'Your advertisement is shown on our Twitter account',
            'price' => 15.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Pinterest',
            'key' => 'PINTEREST',
            'description' => 'Your advertisement is shown on our Pinterest page',
            'price' => 15.0,
            'days_to_expiry' => 0,
        ],
        [
            'title' => 'Newsletter',
            'key' => 'NEWSLETTER',
            'description' => 'Your advertisement is shown in our newsletter (105,000 registrations)',
            'price' => 35.0,
            'days_to_expiry' => 0,
        ],
    ];

    public $subscription_packages = [
        [
            'title' => 'Standard',
            'price' => 15.0,
            'features' => [
                'Banner in every rubric in which their company belongs (not mandatory)',
                'Own homepage'
            ]
        ],
        [
            'title' => 'Plus',
            'price' => 75.0,
            'features' => [
                'Banner in every rubric in which their company belongs (not mandatory)',
                'Own homepage',
                'Place advertisements for free',
                'Place advertisements on all international sites',
                'No commissions',
                'Lift an advertisement to the top of search results 15 times',
                'Advertise in weekly newsletter'
            ]
        ],
        [
            'title' => 'Premium',
            'price' => 125.0,
            'features' => [
                'Banner in every rubric in which their company belongs (not mandatory)',
                'Own homepage',
                'Place advertisements for free',
                'Place advertisements on all international sites',
                'No commissions',
                'Lift an advertisement to the top of search results 15 times',
                'Advertise in weekly newsletter',
                'Access to the list of people who searched for your horse',
                'Advertisement is automatically a top advertisement for one week'
            ]
        ],
    ];

    public function run(): void
    {
        if (!Schema::hasTable('ad_packages')) {
            foreach ($this->packages as $package) {
                AdPackage::create([
                    'title' => $package['title'],
                    'description' => $package['copy'],
                    'price' => $package['price'],
                    'features' => $package['features'],
                ]);
            }
        }

        if (!Schema::hasTable('ad_promotion_addons')) {
            foreach ($this->addons as $package) {
                AdPromotionAddons::create([
                    'title' => $package['title'],
                    'description' => $package['description'],
                    'price' => $package['price'],
                    'days_to_expiry' => $package['days_to_expiry'],
                    'key' => $package['key'],
                ]);
            }
        }

        if (!Schema::hasTable('subscription_packages')) {
            foreach ($this->subscription_packages as $package) {
                SubscriptionPackage::create([
                    'title' => $package['title'],
                    'price' => $package['price'],
                    'features' => $package['features'],
                ]);
            }
        }
    }
}
