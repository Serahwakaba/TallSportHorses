<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class AllUsersList extends Component
{
    use WithPagination;

    #[Url]
    public $filter = 'All Users';

    public function render()
    {
        switch ($this->filter) {
            case "All Users":
                return view('livewire.all-users-list', [
                    'users' => User::paginate(20),
                ]);
                break;

            case "Subscribers":
                return view('livewire.all-users-list', [
                    'users' => User::where('role', 'active')->paginate()
                ]);
                break;

            case "Not Subscribers":
                return view('livewire.all-users-list', [
                    'users' => User::paginate(20),
                ]);
                break;

                // default
            default:
                return view('livewire.all-users-list', [
                    'users' => User::paginate(20),
                ]);
        }
    }
}
