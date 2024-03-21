<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BannerAd;
use Livewire\Attributes\Url;
use App\Livewire\Forms\BannerAdForm;

class UpdateBannerAd extends Component
{
    public BannerAdForm $form;
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

    public function mount(BannerAd $ad)
    {
        $this->form->setAd($ad);
        $this->data = $ad;
    }

    public function render()
    {
        return view('livewire.create-banner-ad');
    }
}
