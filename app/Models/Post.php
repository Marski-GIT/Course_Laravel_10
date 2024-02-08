<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    /**
     * należy do
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Ten post ma wiele użytkowników którzy...
     */
    public function usersThatLike()
    {
        return $this->morphToMany(User::class, 'likeable');
    }

    /**
     * Ten post ma wiele użytkowników którzy...
     */
    public function usersThatDislike()
    {
        return $this->morphToMany(User::class, 'dislikeable');
    }

    public function isLiked()
    {
        return $this->usersThatLike()->where('user_id', Auth::user()->id)->exists();
    }

    public function isDisliked()
    {
        return $this->usersThatDislike()->where('user_id', Auth::user()->id)->exists();
    }
}