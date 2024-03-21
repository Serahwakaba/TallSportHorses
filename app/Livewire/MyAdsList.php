<?php

namespace App\Livewire;

use App\Models\BannerAd;
use App\Models\User;
use App\Models\HorseAd;
use App\Models\RealEstateAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use Livewire\Component;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class MyAdsList extends Component
{
    public $ads = [];
    public $transport_ads = [];
    public $stable_ads = [];
    public $horse_ads = [];
    public $real_estate_ads = [];
    public $banner_ads = [];

    #[Url]
    public $filter = '';

    public function mount()
    {
        $this->transport_ads = TransportAd::where('user_id', Auth::id())->where('published', $this->filter == 'drafts' ? false : true)->get();
        $this->stable_ads = StableAd::where('user_id', Auth::id())->where('published', $this->filter == 'drafts' ? false : true)->get();
        $this->horse_ads = HorseAd::where('user_id', Auth::id())->where('published', $this->filter == 'drafts' ? false : true)->get();
        $this->real_estate_ads = RealEstateAd::where('user_id', Auth::id())->where('published', $this->filter == 'drafts' ? false : true)->get();
        $this->banner_ads = BannerAd::where('user_id', Auth::id())->where('published', $this->filter == 'drafts' ? false : true)->get();

        $this->ads = $this->horse_ads;
    }

    public function render()
    {
        return view('livewire.my-ads-list')->extends('layouts.main');
    }
}
