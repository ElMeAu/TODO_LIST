<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TaskController;

class TasksModel extends Model
{
    use HasFactory;

    class Tasks extends Model
{
    protected $fillable = [
        'title',
        'description',
        '_token'
    ];
}
}
