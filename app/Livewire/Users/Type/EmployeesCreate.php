<?php

namespace App\Livewire\Users\Type;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesCreate extends Component
{
    public $identification_type = 'cpf';
    public $identification;
    public $name;
    public $email;
    public $rg;
    public $birth_date;

    public function save()
    {
    DB::transaction(function () {
        $user = User::create([
            'identification_type' => $this->identification_type,
            'identification' => $this->identification,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);

        $employee = $user->employee()->create([
            'rg' => $this->rg,
            'birth_date' => $this->birth_date,
        ]);

        $user->types()->attach($employee);
    });
        
    }
    public function render()
    {
        return view('livewire.users.type.employees-create');
    }
}
