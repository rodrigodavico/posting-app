<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // elocuent relation to posts.
    public function posts() {
        return $this->hasMany(Post::class);
    }

    // elocuent relation with likes
    public function likes() {
        return $this->hasMany(Like::class);
    }

    // elocuent relation to received likes.
    public function receivedLikes() {
        return $this->hasManyThrough(Like::class, Post::class);
    }

    // elocuent relation to tasks
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
