<?php

namespace App\Traits;

use App\Models\Note;

trait Notable
{
    /**
     * @return mixed
     */
    public function notes()
    {
        return $this->belongsToMany(Note::class, $this->table . '_notes');
    }


}