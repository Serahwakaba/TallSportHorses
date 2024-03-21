<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\Invoice;
use App\Models\BannerAd;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class BannerAdForm extends Form
{
    public ?BannerAd $ad;

    #[Validate('required|min:5')]
    public $title;
    public $category;

    #[Validate('required')]
    public $position;

    #[Validate('required')]
    public $link;

    public $images;
    public $label;
    public $user_id;

    public function setAd(BannerAd $ad)
    {
        $this->ad = $ad;

        $this->title = $ad->title;
        $this->category = $ad->category;
        $this->position = $ad->position;

        $this->link = $ad->link;

        $this->label = $ad->label;
        $this->images = $ad->images;
    }

    public function store()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $saved_ad = BannerAd::create($this->only(['title', 'category', 'position', 'link', 'images', 'label', 'user_id']));

        return $saved_ad['id'];
    }

    public function update()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $this->ad->update($this->only(['title', 'category', 'position', 'link', 'images', 'label', 'user_id']));
    }


    public function publish()
    {
        $this->user_id = Auth::id();

        $invoice = Invoice::create([
            'user_id' => $this->user_id,
            'invoice_type' => 'ad',
            'total' => 0,
            'discount_total' => 0,
            'items' => [],
            'tax_rate' => 0,
            'paid' => false,

            'invoiceable_id' => $this->ad['id'],
            'invoiceable_type' => 'App\Models\BannerAd',
        ]);

        $this->ad->update(['published' => true, 'publish_date' => Carbon::now(), 'publish_addons', 'publish_package']);
    }
}
