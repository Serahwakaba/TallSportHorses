<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\Invoice;
use App\Models\StableAd;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class StableAdForm extends Form
{
    public ?StableAd $ad;

    #[Validate('required|min:5')]
    public $title;

    public $category;
    public $color;
    public $price;
    public $poa;
    public $business_type;
    public $description;
    public $video_link;
    public $label;
    public $user_id;
    public $images;

    public function setAd(StableAd $ad)
    {
        $this->ad = $ad;

        $this->title = $ad->title;
        $this->category = $ad->category;
        $this->color = $ad->color;
        $this->price = $ad->price;
        $this->poa = $ad->poa;
        $this->business_type = $ad->business_type;
        $this->description = $ad->description;
        $this->video_link = $ad->video_link;
        $this->label = $ad->label;
        $this->images = $ad->images;
    }

    public function store()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $saved_ad = StableAd::create($this->only(['title', 'category', 'images', 'business_type', 'description', 'video_link', 'label', 'user_id', 'price', 'poa', 'label']));

        return $saved_ad['id'];
    }

    public function update()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $this->ad->update($this->only(['title', 'category', 'images', 'business_type', 'description', 'video_link', 'label', 'user_id', 'price', 'poa', 'label']));
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
            'invoiceable_type' => 'App\Models\StableAd',
        ]);

        $this->ad->update(['published' => true, 'publish_date' => Carbon::now(), 'publish_addons', 'publish_package']);
    }
}
