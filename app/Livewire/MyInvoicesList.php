<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyInvoicesList extends Component
{
    public $invoices = [];

    public function mount()
    {
        $this->invoices = User::find(Auth::id())->invoices;
    }

    public function render()
    {
        return view('livewire.my-invoices-list')->extends('layouts.main');
    }
}
