<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'video_id', 'short_description', 'full_description',
        'cover_image_id', 'intensity_id', 'difficulty_id', 'coach_id'
    ];

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
