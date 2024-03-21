<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\HorseAd;
use Livewire\Component;
use App\Models\BannerAd;
use App\Models\StableAd;
use App\Models\TransportAd;
use App\Models\RealEstateAd;

class ManageAd extends Component
{
    public $ad;
    public $showEditOptions = false;

    public function mount($adType, $id)
    {
        switch ($adType) {
            case "horses":
                return $this->ad = HorseAd::find($id);
                break;
            case "ponies":
                return $this->ad = HorseAd::find($id);
                break;
            case "stable":
                return $this->ad = StableAd::find($id);
                break;
            case "transport":
                return $this->ad = TransportAd::find($id);
                break;
            case "real-estate":
                return $this->ad = RealEstateAd::find($id);
                break;
            case "banner":
                return $this->ad = BannerAd::find($id);
                break;
                // additional cases as needed
            default:
                return $this->ad = HorseAd::find($id);
        }
    }

    public function delete()
    {
        $this->ad->delete();

        return $this->redirect('/all-ads');
    }

    public function togglePublish()
    {
        $this->ad->update(['published' => !$this->ad->published, 'publish_date' => Carbon::now()]);

        return $this->redirect('/all-ads');
    }

    public function render()
    {
        return view('livewire.manage-ad')->extends('layouts.main');
    }
}
