<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\HorseAd;
use App\Models\Invoice;
use Livewire\Component;
use App\Models\BannerAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use App\Models\RealEstateAd;
use App\Traits\UserAdAnalyticsTrait;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    use UserAdAnalyticsTrait;

    public $ads = [];
    public $invoices = [];
    public $ads_count = 0;
    public $views_count = 0;
    public $leads_count = 0;
    public $messages_count = 0;

    public $horse_ads = 0;
    public $ponies_ads = 0;
    public $friesian_ads = 0;
    public $transport_ads = 0;
    public $stable_ads = 0;
    public $realestate_ads = 0;
    public $banner_ads = 0;

    public function mount()
    {
        $this->ads = User::find(Auth::id())->horseAds;
        $this->invoices = Invoice::where('user_id', Auth::id())->limit(5)->get();

        $this->ads_count = Auth::user()->role == 'user' ? $this->adsCount() : $this->allAdsCount();
        $this->views_count = Auth::user()->role == 'user' ? $this->viewsCount() : $this->allViewsCount();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
