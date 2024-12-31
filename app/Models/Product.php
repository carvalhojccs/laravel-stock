<?php

namespace App\Models;


use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $guarded = ['id'];

    public function order(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (float|int $value) => Number::format($value / 100, precision: 2, locale: 'pt_BR'),
            set: fn (float|int $value) => $value * 100,
        );
    }
}
