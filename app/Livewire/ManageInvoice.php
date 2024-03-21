<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class ManageInvoice extends Component
{
    public $invoice;
    public $ad;

    public function mount($id)
    {
        $data = Invoice::find($id);

        $this->invoice = $data;
        $this->ad = $data->invoiceable;
    }

    public function render()
    {
        return view('livewire.manage-invoice')->extends('layouts.main');
    }
}
