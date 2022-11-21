<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class CreateTask extends Component
{

    public Task $task;

    public function render()
    {
        return view('livewire.tasks.create-task');
    }
}
