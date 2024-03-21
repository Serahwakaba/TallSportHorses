<?php

namespace App\Livewire;

use App\Livewire\Forms\BannerAdForm;
use Livewire\Component;

class CreateBannerAd extends Component
{
    public BannerAdForm $form;
    public $editMode = false;
    public $activeTab = 'EDITOR';

    public function save()
    {
        $ad_id = $this->form->store();

        return $this->redirect('/ads/banner' . '/' . $ad_id);
    }

    public function render()
    {
        return view('livewire.create-banner-ad');
    }
}
