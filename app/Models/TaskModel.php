<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'description'];

    public function getUserTasks($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
}

