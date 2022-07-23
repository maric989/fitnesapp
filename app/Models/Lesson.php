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
        return $this->belongsToMany(Program::class, 'program_lesson_days')
            ->withPivot(['day']);
    }

    public function coverImage()
    {
        return $this->hasOne(File::class, 'id', 'cover_image_id');
    }

    public function difficulty()
    {
        return $this->hasOne(Difficulty::class, 'id', 'difficulty_id');
    }

    public function intensity()
    {
        return $this->hasOne(Intensity::class, 'id', 'intensity_id');
    }

    public function programsTitle()
    {
        return $this->programs()->pluck('title')->toArray();
    }
}
