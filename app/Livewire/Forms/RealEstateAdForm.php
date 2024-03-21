<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\Invoice;
use App\Models\RealEstateAd;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class RealEstateAdForm extends Form
{
    public ?RealEstateAd $ad;

    #[Validate('required|min:5')]
    public $title;

    public $category;
    public $price;
    public $poa;
    public $description;
    public $video_link;
    public $label;
    public $user_id;
    public $country;
    public $province;
    public $zip_code;
    public $address;
    public $place;

    public $year_of_construction;
    public $size;
    public $amenities;
    public $images;

    public function setAd(RealEstateAd $ad)
    {
        $this->ad = $ad;

        $this->title = $ad->title;
        $this->category = $ad->category;
        $this->country = $ad->country;
        $this->province = $ad->province;
        $this->zip_code = $ad->zip_code;
        $this->address = $ad->address;
        $this->place = $ad->place;
        $this->year_of_construction = $ad->year_of_construction;
        $this->amenities = $ad->amenities;
        $this->size = $ad->size;
        $this->poa = $ad->poa;
        $this->description = $ad->description;
        $this->video_link = $ad->video_link;
        $this->label = $ad->label;
        $this->images = $ad->images;
    }

    public function store()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $saved_ad = RealEstateAd::create($this->only(['title', 'category', 'images', 'country', 'description', 'video_link', 'label', 'user_id', 'province', 'zip_code', 'address', 'place', 'price', 'poa', 'label', 'year_of_construction', 'amenities', 'size']));

        return $saved_ad['id'];
    }

    public function update()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $this->ad->update($this->only(['title', 'category', 'images', 'country', 'description', 'video_link', 'label', 'user_id', 'province', 'zip_code', 'address', 'place', 'price', 'poa', 'label', 'year_of_construction', 'amenities', 'size']));
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
            'invoiceable_type' => 'App\Models\RealEstateAd',
        ]);

        $this->ad->update(['published' => true, 'publish_date' => Carbon::now(), 'publish_addons', 'publish_package']);
    }
}
