<?php

namespace App\Livewire;

use App\Models\SubscriptionPackage;
use Livewire\Component;

class Subscription extends Component
{
    public $subscription_packages = [];

    public function mount()
    {
        $this->subscription_packages = SubscriptionPackage::all();
    }

    public function render()
    {
        return view('livewire.subscription')->extends('layouts.app');
    }
}
