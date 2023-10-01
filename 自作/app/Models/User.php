<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';  // ここで主キーを設定
   
    public function posts() {
        return $this->hasMany(Post::class, 'user_id', 'user_id');
    }
    
    public function likedPosts()
    {
        // likesテーブルを介してPostモデルと関連づける
        return $this->belongsToMany(Post::class, 'likes');
    }
}
