<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Rules\CNPJValidator;
use App\Rules\CPFValidator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UsersCreate extends Component
{
    public $identification_type = 'cpf';
    public $identification;

    public $name;
    public $email;

    public function save()
    {
        if ($this->identification_type == 'cpf') {
            $validated = $this->validate([
                'identification' => ['required', new CPFValidator, Rule::unique('users','identification')],
                'name' => ['required', 'string', 'min:5','max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users','email')]
            ]);
        }

        if ($this->identification_type == 'cnpj') {
            $validated = $this->validate([
                'identification' => ['required', new CNPJValidator]
            ]);
        }

        if ($this->identification_type == 'passport') {
            $validated = $this->validate([
                'identification' => ['required', 'min:9']
            ]);
        }

        if ($this->identification_type == 'other') {
            $validated = $this->validate([
                'identification' => ['required', 'min:4']
            ]);
        }

        User::create($validated);
        
    }

    public function render()
    {
        return view('livewire.users.users-create');
    }
}
