<?php

namespace App\Livewire;

use App\Models\BannerAd;
use App\Models\HorseAd;
use App\Models\RealEstateAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use Livewire\Component;

class AdsAnalytics extends Component
{
    public $horse_ads = 0;
    public $ponies_ads = 0;
    public $friesian_ads = 0;
    public $transport_ads = 0;
    public $stable_ads = 0;
    public $realestate_ads = 0;
    public $banner_ads = 0;

    public function mount()
    {
        $this->horse_ads = HorseAd::count();
        $this->transport_ads = TransportAd::count();
        $this->stable_ads = StableAd::count();
        $this->realestate_ads = RealEstateAd::count();
        $this->banner_ads = BannerAd::count();
    }

    public function render()
    {
        return view('livewire.ads-analytics');
    }
}
