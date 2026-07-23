<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title','site_id', 'slug', 'description', 'images', 'is_visible'];

    protected $casts = [
        'images' => 'array',
        'is_visible' => 'boolean',
    ];
}
