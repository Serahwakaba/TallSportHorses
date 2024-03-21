<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TransportAd;
use Livewire\Attributes\Url;
use App\Livewire\Forms\TransportAdForm;

class UpdateTransportAd extends Component
{
    public TransportAdForm $form;
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

    public function mount(TransportAd $ad)
    {
        $this->form->setAd($ad);

        $this->data = $ad;
    }

    public function render()
    {
        return view('livewire.create-transport-ad');
    }
}
