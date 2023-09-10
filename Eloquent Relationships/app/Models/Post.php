<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
        // return $this->belongsToMany(Tag::class, 'assigments')->withTimestamps();
    }
}

// posts
// tags ['family', 'personal', 'work', 'vaction']
// post_tag: singular form + alphabet order
