<?php

namespace App\Models;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table  = 'comments';
    protected $fillable =[
        'discussion_id',
        'user_id',
        'comment_body'
    ];
    public function discussion()
    {
        return $this->belongsTo(Discussion::class, 'discussion_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    // public function replies()
    // {
    //     return $this->hasMany(Comment::class, 'parent_id');
    // }
}
