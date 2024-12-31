<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogisticOperator extends Model
{
    public function casts(): array
    {
        return [
            'birth_date' => 'datetime',
        ];
    }

    
}
