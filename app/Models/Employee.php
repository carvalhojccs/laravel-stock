<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];
    public function casts(): array
    {
        return [
            'birth_date' => 'datetime',
        ];
    }

    
}
