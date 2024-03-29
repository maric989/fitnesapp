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

    public function focuses()
    {
        return $this->hasOne(Focus::class, 'id', 'focus_id');
    }

    public function difficulty()
    {
        return $this->hasOne(Difficulty::class, 'id', 'difficulty_id');
    }

    public function intensity()
    {
        return $this->hasOne(Intensity::class, 'id', 'intensity_id');
    }

    public function coverPhoto()
    {
        return $this->hasOne(File::class, 'id', 'cover_id');
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'program_lesson_days')
            ->withPivot('day');
    }

    public function lessonDays()
    {
        return $this->hasMany(ProgramLessonDay::class, 'program_id', 'id');
    }

    public function scopeWhereId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeProgramData($query)
    {
        return $query->with(['focuses', 'difficulty', 'intensity', 'coverPhoto']);
    }
}
