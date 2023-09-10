<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affiliation extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
        // hasMany POST - I want the collection of Posts
        // Through User - Using User

        // 제휴된 포스트
        // 제휴된 사용자를 찾아, 해당 사용자가 작성한 게시물을 검색
        // 1. affiliations.id - 제휴 모델의 아이디를 가지고
        // 2. users.affiliation_id - 사용자가 해당 제휴 모델 아이디를 가지고 있는 경우를 찾아
        // 3. posts.user_id - 게시물이 해당 사용자인 경우를 찾아 반환한다.
    }
}
