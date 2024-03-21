<?php

namespace App\Livewire;

use Livewire\Component;

class ListAdFeeds extends Component
{
    public function render()
    {
        return view('livewire.list-ad-feeds')->extends('layouts.main');
    }
}
