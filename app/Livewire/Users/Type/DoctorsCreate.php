<?php

namespace App\Livewire\Users\Type;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorsCreate extends Component
{
    public $identification_type = 'cpf';
    public $identification;
    public $name;
    public $email;
    public $crm;
    public $specialty;

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

        $doctor = $user->doctor()->create([
            'crm' => $this->crm,
            'specialty' => $this->specialty,
        ]);

        $user->types()->attach($doctor);
    });
        
    }
    public function render()
    {
        return view('livewire.users.type.doctors-create');
    }
}
