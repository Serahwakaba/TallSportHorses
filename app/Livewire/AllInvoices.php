<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class AllInvoices extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.all-invoices', [
            'invoices' => Invoice::paginate(10),
        ]);
    }
}
