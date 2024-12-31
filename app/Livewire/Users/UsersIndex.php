<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UsersIndex extends Component
{
    public function render()
    {
        return view('livewire.users.users-index', [
            'users' => User::all()
        ]);
    }
}
