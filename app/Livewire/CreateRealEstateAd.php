<?php

namespace App\Livewire;

use App\Livewire\Forms\RealEstateAdForm;
use App\Models\RealEstateAd;
use Livewire\Component;

class CreateRealEstateAd extends Component
{
    public RealEstateAdForm $form;
    public $editMode = false;
    public $activeTab = 'EDITOR';

    public function save()
    {
        $ad_id = $this->form->store();

        return $this->redirect('/ads/real-estate' . '/' . $ad_id);
    }

    public function render()
    {
        return view('livewire.create-real-estate-ad');
    }
}
