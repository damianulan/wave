<?php

namespace App\Traits;

use App\Models\Task;

trait Taskable
{
    public function tasks() {
        return $this->hasMany(Task::class, 'target_id', 'id')
                    ->whereNull('completed_at')
                    ->orderBy('deadline_at', 'DESC')
                    ->orderBy('priority', 'DESC'); 
    }

    public function tasksCompleted() {
        return $this->hasMany(Task::class, 'target_id', 'id')
                    ->whereNotNull('completed_at')
                    ->orderBy('completed_at', 'DESC')
                    ->orderBy('priority', 'DESC'); 
    }

    public function tasksDelegated() {
        return $this->hasMany(Task::class, 'author_id', 'id')
                    ->orderBy('deadline_at', 'DESC')
                    ->orderBy('priority', 'DESC')
                    ->orderBy('completed_at', 'DESC');
    }


}