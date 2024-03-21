<?php

namespace App\Livewire;

use App\Livewire\Forms\StableAdForm;
use Livewire\Component;

class CreateStableAd extends Component
{
    public StableAdForm $form;
    public $editMode = false;
    public $activeTab = 'EDITOR';

    public function save()
    {
        $ad_id = $this->form->store();

        return $this->redirect('/ads/stable' . '/' . $ad_id);
    }

    public function render()
    {
        return view('livewire.create-stable-ad');
    }
}
