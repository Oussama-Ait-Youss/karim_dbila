<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workshop extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'price',
        'max_capacity',
        'spots_remaining',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'datetime',
        ];
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(WorkshopBooking::class);
    }
}
