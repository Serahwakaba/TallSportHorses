<?php

namespace App\Traits;

use App\Models\User;
use App\Models\HorseAd;
use App\Models\BannerAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use App\Models\RealEstateAd;
use Illuminate\Support\Facades\Auth;

trait UserAdAnalyticsTrait
{
    public function adsCount()
    {
        $horse_ads_count = User::find(Auth::id())->horseAds->count();
        $transport_ads_count = User::find(Auth::id())->transportAds->count();
        $stable_ads_count = User::find(Auth::id())->stableAds->count();
        $realestate_ads_count = User::find(Auth::id())->realEstateAds->count();
        $banner_ads_count = User::find(Auth::id())->bannerAds->count();

        return array_sum([$horse_ads_count, $transport_ads_count, $stable_ads_count, $realestate_ads_count, $banner_ads_count]);
    }

    public function allAdsCount()
    {
        $horse_ads = HorseAd::count();
        $transport_ads = TransportAd::count();
        $stable_ads = StableAd::count();
        $realestate_ads = RealEstateAd::count();
        $banner_ads = BannerAd::count();

        return array_sum([$horse_ads, $transport_ads, $stable_ads, $realestate_ads, $banner_ads]);
    }

    public function viewsCount()
    {
        $horse_ads = User::find(Auth::id())->horseAds->toArray();
        $transport_ads = User::find(Auth::id())->transportAds->toArray();
        $stable_ads = User::find(Auth::id())->stableAds->toArray();
        $realestate_ads = User::find(Auth::id())->realEstateAds->toArray();
        $banner_ads = User::find(Auth::id())->bannerAds->toArray();

        $views_count = array_map(function ($n) {
            return $n['views'];
        }, [...$horse_ads, ...$transport_ads, ...$stable_ads, ...$realestate_ads, ...$banner_ads]);

        return array_sum($views_count);
    }

    public function allViewsCount()
    {
        $horse_ads = HorseAd::all()->toArray();
        $transport_ads = TransportAd::all()->toArray();
        $stable_ads = StableAd::all()->toArray();
        $realestate_ads = RealEstateAd::all()->toArray();
        $banner_ads = BannerAd::all()->toArray();

        $views_count = array_map(function ($n) {
            return $n['views'];
        }, [...$horse_ads, ...$transport_ads, ...$stable_ads, ...$realestate_ads, ...$banner_ads]);

        return array_sum($views_count);
    }
}
