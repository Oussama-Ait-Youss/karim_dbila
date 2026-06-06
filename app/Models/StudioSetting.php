<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudioSetting extends Model
{
    protected $fillable = [
        'owner_bio',
        'owner_photo_path',
        'studio_address',
        'opening_hours',
        'primary_color',
        'secondary_color',
        'accent_color',
    ];
}
