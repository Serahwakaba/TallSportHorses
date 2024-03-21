<?php

namespace App\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Form;
use App\Models\HorseAd;
use App\Models\Invoice;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class HorseForm extends Form
{
    public ?HorseAd $ad;

    #[Validate('required|min:5')]
    public $title;

    public $category;
    public $predicate;
    public $age;
    public $level;
    public $gender;
    public $studbook;
    public $color;
    public $withers_length;
    public $price;
    public $poa;
    public $xray_approved;
    public $xray_approved_date;
    public $clinical_proven;
    public $clinical_proven_date;
    public $description;
    public $family_tree;
    public $achievements;
    public $video_link;
    public $images;
    public $label;
    public $user_id;

    public $publish_package;
    public $publish_addons;

    public function setAd(HorseAd $ad)
    {
        $this->ad = $ad;

        $this->title = $ad->title;
        $this->category = $ad->category;
        $this->predicate = $ad->predicate;
        $this->age = $ad->age;
        $this->level = $ad->level;
        $this->gender = $ad->gender;
        $this->studbook = $ad->studbook;
        $this->color = $ad->color;
        $this->withers_length = $ad->withers_length;
        $this->price = $ad->price;
        $this->poa = $ad->poa;
        $this->xray_approved = $ad->xray_approved;
        $this->xray_approved_date = $ad->xray_approved_date;
        $this->clinical_proven = $ad->clinical_proven;
        $this->clinical_proven_date = $ad->clinical_proven_date;
        $this->description = $ad->description;
        $this->family_tree = $ad->family_tree;
        $this->achievements = $ad->achievements;
        $this->video_link = $ad->video_link;
        $this->label = $ad->label;
        $this->images = $ad->images;

        $this->publish_package = $ad->publish_package;
        $this->publish_addons = $ad->publish_addons;
    }

    public function store()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $saved_ad = HorseAd::create($this->only(['title', 'category', 'predicate', 'age', 'level', 'gender', 'studbook', 'color', 'withers_length', 'price', 'poa', 'xray_approved', 'xray_approved_date', 'clinical_proven', 'clinical_proven_date', 'description', 'family_tree', 'video_link', 'images', 'achievements', 'label', 'user_id']));

        return $saved_ad['id'];
    }

    public function update()
    {
        $this->validate();
        $this->user_id = Auth::id();

        $this->ad->update($this->only(['title', 'category', 'predicate', 'age', 'level', 'gender', 'studbook', 'color', 'withers_length', 'price', 'poa', 'xray_approved', 'xray_approved_date', 'clinical_proven', 'clinical_proven_date', 'description', 'family_tree', 'video_link', 'images', 'achievements', 'label', 'user_id']));
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
            'invoiceable_type' => 'App\Models\HorseAd',
        ]);

        $this->ad->update(['published' => true, 'publish_date' => Carbon::now(), 'publish_addons', 'publish_package']);
    }
}
