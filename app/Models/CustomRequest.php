<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomRequest extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'requested_height',
        'requested_diameter',
        'clay_type',
        'glaze_type',
        'sketch_image_path',
        'status',
        'quoted_price',
        'stripe_payment_intent_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
