<?php

namespace App\Livewire;

use App\Livewire\Forms\TransportAdForm;
use Livewire\Component;

class CreateTransportAd extends Component
{
    public TransportAdForm $form;
    public $editMode = false;
    public $activeTab = 'EDITOR';

    public function save()
    {
        $ad_id = $this->form->store();

        return $this->redirect('/ads/transport' . '/' . $ad_id);
    }

    public function render()
    {
        return view('livewire.create-transport-ad');
    }
}
