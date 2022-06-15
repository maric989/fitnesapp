<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLessonDay extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = false;

    protected $fillable = ['program_id', 'lession_id', 'day'];

    public function scopeProgramFreeDays($query, $programId)
    {
        return $query->where('program_id', $programId)->whereNull('lesson_id');
    }
}
