<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body'
    ];

    // elocuent relation to user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // elocuent relation to likes
    public function likes() {
        return $this->hasMany(Like::class);
    }

    // check whether post was liked by particular user.
    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }
}
