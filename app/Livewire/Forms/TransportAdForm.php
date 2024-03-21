<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\Invoice;
use App\Models\TransportAd;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class TransportAdForm extends Form
{
    public ?TransportAd $ad;

    #[Validate('required|min:5')]
    public $title;

    public $category;
    public $color;
    public $price;
    public $poa;
    public $description;
    public $video_link;
    public $yom;
    public $brand;
    public $carry_capacity;
    public $material;
    public $driving_license;
    public $label;
    public $user_id;
    public $images;

    public function setAd(TransportAd $ad)
    {
        $this->ad = $ad;

        $this->title = $ad->title;
        $this->category = $ad->category;
        $this->color = $ad->color;
        $this->price = $ad->price;
        $this->poa = $ad->poa;
        $this->yom = $ad->yom;
        $this->material = $ad->material;
        $this->carry_capacity = $ad->carry_capacity;
        $this->driving_license = $ad->driving_license;
        $this->brand = $ad->brand;
        $this->description = $ad->description;
        $this->video_link = $ad->video_link;
        $this->label = $ad->label;
        $this->images = $ad->images;
    }

    public function store()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $saved_ad = TransportAd::create($this->only(['title', 'category', 'images', 'color', 'material', 'yom', 'carry_capacity', 'driving_license', 'brand', 'description', 'video_link', 'label', 'user_id']));

        return $saved_ad['id'];
    }

    public function update()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $this->ad->update($this->only(['title', 'category', 'images', 'color', 'material', 'yom', 'carry_capacity', 'driving_license', 'brand', 'description', 'video_link', 'label', 'user_id']));
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
            'invoiceable_type' => 'App\Models\TransportAd',
        ]);

        $this->ad->update(['published' => true, 'publish_date' => Carbon::now(), 'publish_addons', 'publish_package']);
    }
}
