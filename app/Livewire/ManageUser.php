<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ManageUser extends Component
{
    public $user;
    public $ads;
    public $showEditOptions = false;

    public function mount($id)
    {
        $data = User::find($id);

        $this->user = $data;
    }

    public function render()
    {
        return view('livewire.manage-user')->extends('layouts.main');
    }
}
