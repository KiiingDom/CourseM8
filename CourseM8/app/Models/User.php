<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'bio',
        'age',
        'studyAreas',
        'password',
        'course',
        'year_of_study',
        'major',
        'career_aspirations',
        'study_preferences',
        'study_location',
        'study_method',
        'learning_style',
        'note_taking',
        'review_method',
        'group_size',
        'study_frequency',
        'collaboration_tools',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'user_tags');
    }
}
