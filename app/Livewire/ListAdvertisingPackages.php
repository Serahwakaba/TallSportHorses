<?php

namespace App\Livewire;

use App\Models\AdPackage;
use Livewire\Component;

class ListAdvertisingPackages extends Component
{
    public function render()
    {
        return view('livewire.list-advertising-packages', [
            'packages' => AdPackage::all()
        ])->extends('layouts.main');
    }
}
