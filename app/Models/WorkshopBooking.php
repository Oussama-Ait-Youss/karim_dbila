<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkshopBooking extends Model
{
    protected $fillable = [
        'user_id',
        'workshop_id',
        'stripe_session_id',
        'spots_booked',
        'payment_status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function workshop(): BelongsTo
    {
        return $this->belongsTo(Workshop::class);
    }
}
