<?php

namespace App\Livewire;

use Livewire\Component;

class MyFavoritesList extends Component
{
    public function render()
    {
        return view('livewire.my-favorites-list')->extends('layouts.main');;
    }
}
