<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['group','site_id', 'value', 'key', 'featured_image'];

    protected $casts = [
    ];

    public static function getValue(
        string $group,
        string $key,
        mixed $default = null
    ): mixed {
        return static::query()
            ->where('group', $group)
            ->where('key', $key)
            ->value('value') ?? $default;
    }
}
