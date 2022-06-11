<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Focus extends Model
{
    protected $table = 'focuses';

    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];
}
