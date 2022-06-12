<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'short_description', 'full_description', 'video_id', 'trailer_id', 'duration',
        'cover_id', 'difficulty_id', 'focus_id', 'intensity_id'
    ];
}
