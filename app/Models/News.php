<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // Specify the table name (optional if following Laravel naming convention)
    protected $table = 'news';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'source',
        'category',
        'image',
        'published_at',
    ];

    // Cast published_at to Carbon datetime object
    protected $casts = [
        'published_at' => 'datetime',
    ];
}
