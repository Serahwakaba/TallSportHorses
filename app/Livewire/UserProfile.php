<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    public $username;
    public $email;

    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
