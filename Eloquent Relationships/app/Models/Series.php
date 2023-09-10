<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    public function videos()
    {
        // return $this->belongsTo(Video::class);
        return $this->morphMany(Video::class, 'watchable');
    }
}
