<?php

namespace App\Models;

use App\Models\Series;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    public function watchable()
    {
        // return $this->belongsTo();
        return $this->morphTo();
    }
}
