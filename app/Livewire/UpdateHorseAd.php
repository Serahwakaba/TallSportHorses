<?php

namespace App\Livewire;

use App\Livewire\Forms\HorseForm;
use App\Models\HorseAd;
use Livewire\Component;
use Livewire\Attributes\Url;

class UpdateHorseAd extends Component
{
    public HorseForm $form;
    public $editMode = true;

    #[Url]
    public $activeTab = 'PUBLISH';
    public $data;

    protected $listeners = [
        'published' => 'publish',
    ];

    public function save()
    {
        $this->form->update();

        return $this->redirect('/my-ads');
    }

    public function publish()
    {
        $this->form->publish();

        return $this->redirect('/my-ads');
    }

    public function mount(HorseAd $ad)
    {
        $this->form->setAd($ad);
        $this->data = $ad;
    }

    public function render()
    {
        return view('livewire.horse-ad-form');
    }
}
