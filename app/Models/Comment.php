<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    public function notification(){
        return $this->morphMany(Notification::class, 'notifiable');
    }
}
