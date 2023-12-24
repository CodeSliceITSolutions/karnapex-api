<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskAchievement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tasks_id',
        'user_id',
        'email_id',
        'display_name',
        'user_photo',
    ];
}
