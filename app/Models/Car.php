<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasUuids;

    public $table = 'car_washs';

    protected $fillable = [
        'nopol',
        'car_colour',
        'price',
        'status',
        'customer_id',
        'created_by'
    ];

    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class);
    }
}
