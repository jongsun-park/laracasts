<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // /users/flo/posts
    // $flo->posts
    public function posts()
    {
        return $this->hasMany(Post::class);
        // return $this->hasMany(Post::class, 'user_id'); // default
        // return $this->hasMany(Post::class, 'person_id'); // if use different id
    }

    // public function jobs(){
    //     return $this->hasMany(Job::class);
    // }


}

// a user can have many posts
// a post have many comments
// a project can have many tasks
// a user can have many jobs
// a user can have many achievements
