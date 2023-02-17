<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'cmnt',
        'user_id',
        'post_id',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
  
}
