<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // $vacationTag->posts;
    // vacation 태그가 있는 모든 post
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
