<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $about
 * @property string $experience
 * @property string $bio
 */
class Coach extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'about', 'experience',
        'bio', 'profile_picture_id'
    ];

    public function profileImage()
    {
        return $this->hasOne(File::class, 'id', 'profile_picture_id');
    }
}
