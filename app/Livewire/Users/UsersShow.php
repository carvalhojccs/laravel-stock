<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UsersShow extends Component
{
    public User $user;
    public function render()
    {
        return view('livewire.users.users-show', [
            'user' => $this->user,
        ]);
    }
}
