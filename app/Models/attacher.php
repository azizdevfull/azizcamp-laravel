<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\project;
class attacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
