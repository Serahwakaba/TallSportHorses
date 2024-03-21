<?php

namespace App\Livewire;

use App\Livewire\Forms\HorseForm;
use Livewire\Component;

class HorseAdForm extends Component
{
    public HorseForm $form;
    public $editMode = false;
    public $activeTab = 'EDITOR';

    public function save()
    {
        $ad_id = $this->form->store();

        return $this->redirect('/ads/horses' . '/' . $ad_id);
    }

    public function render()
    {
        return view('livewire.horse-ad-form');
    }
}
