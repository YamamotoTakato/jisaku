<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';

    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id', 'post_id'); // 第二引数に外部キー、第三引数にローカルキー
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    


}







 // const CREATED_AT = 'created_at';
    // const UPDATED_AT = null;