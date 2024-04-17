<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    use HasFactory;
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes','post_id', 'user_id');

    }
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
