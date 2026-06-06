<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomRequest extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'design_vision',
        'height',
        'diameter',
        'clay_type',
        'glaze_finish',
        'reference_image',
        'status',
        'quoted_price',
        'stripe_payment_intent_id',
    ];

}
