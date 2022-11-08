<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;


    public function comments()
    {
        return $this->hasMany(Comment::class, 'discussion_id', 'id');
    }

}
