<?php

namespace App\Livewire;

use App\Models\AdPromotionAddons;
use Livewire\Component;

class ListAdvertisingAddons extends Component
{
    public function render()
    {
        return view('livewire.list-advertising-addons', [
            'addons' => AdPromotionAddons::all()
        ])->extends('layouts.main');
    }
}
