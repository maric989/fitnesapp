<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonProgram extends Model
{
    use HasFactory;

    protected $table = 'lesson_program';

    protected $fillable = ['program_id', 'lesson_id'];

    public $timestamps = false;
}
