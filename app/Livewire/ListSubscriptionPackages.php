<?php

namespace App\Livewire;

use App\Models\SubscriptionPackage;
use Livewire\Component;

class ListSubscriptionPackages extends Component
{

    public function render()
    {
        return view('livewire.list-subscription-packages', [
            'packages' => SubscriptionPackage::all()
        ])->extends('layouts.main');
    }
}
