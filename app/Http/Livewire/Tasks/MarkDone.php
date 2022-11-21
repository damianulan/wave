<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\User;
use App\Models\Task;

class MarkDone extends Component
{
    public function render()
    {
        return <<<'blade'
            <input class="form-check-input" type="checkbox" wire:change="mark">
        blade;
    }

    public function mark()
    {
        $this->emit('true');
    }
}
