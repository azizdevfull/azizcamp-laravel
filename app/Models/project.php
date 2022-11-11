<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\attacher;
use App\Models\Task;


class project extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachers()
    {
        return $this->hasMany(Attacher::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
