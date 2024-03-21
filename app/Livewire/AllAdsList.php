<?php

namespace App\Livewire;

use App\Models\BannerAd;
use App\Models\HorseAd;
use App\Models\RealEstateAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class AllAdsList extends Component
{
    use WithPagination;

    #[Url]
    public $adType = 'Horses';
    public $filter = 'active';
    public $adTypes = ['Horses', 'Ponies', 'Friesian', 'Transport', 'Equestrian real estate', 'Stabling and Grazing', 'Banner'];


    public function setAdType($t)
    {
        $this->adType = $t;
    }

    public function render()
    {

        switch ($this->adType) {
            case "Horses":
                return view('livewire.all-ads-list', [
                    'ads' => HorseAd::paginate(20),
                    'category' => 'horses'
                ]);
                break;
            case "Ponies":
                return view('livewire.all-ads-list', [
                    'ads' => HorseAd::paginate(20),
                    'category' => 'ponies'
                ]);
                break;
            case "Stabling and Grazing":
                return view('livewire.all-ads-list', [
                    'ads' => StableAd::paginate(20),
                    'category' => 'stable'
                ]);
                break;
            case "Transport":
                return view('livewire.all-ads-list', [
                    'ads' => TransportAd::paginate(20),
                    'category' => 'transport'
                ]);
                break;
            case "Equestrian real estate":
                return view('livewire.all-ads-list', [
                    'ads' => RealEstateAd::paginate(20),
                    'category' => 'real-estate'
                ]);
                break;
            case "Banner":
                return view('livewire.all-ads-list', [
                    'ads' => BannerAd::paginate(20),
                    'category' => 'banner'
                ]);
                break;
                // additional cases as needed
            default:
                return view('livewire.all-ads-list', [
                    'ads' => HorseAd::paginate(20),
                    'category' => 'horses'
                ]);
        }
    }
}
