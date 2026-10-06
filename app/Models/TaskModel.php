<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $returnType = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'title',
        'description',
        'task_date',
        'is_archived'
    ];

    protected array $casts = [
        'is_archived' => 'boolean'
    ];
}