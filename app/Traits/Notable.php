<?php

namespace App\Traits;

use App\Models\Note;
use Illuminate\Support\Facades\DB;

trait Notable
{
    /**
     * Requirements:
     * Trackable trait
     * 
     */


    /**
     * @return mixed
     */
    public function notes()
    {
        return $this->belongsToMany(Note::class, $this->table . '_notes');
    }

    public function writeNote($text)
    {
        $note = new Note();

        $arr = explode("\n", trim($text));
        $arr = array_filter($arr, 'trim');

        $note->text = $arr;
        $note->added_by = auth()->user()->id;
        
        if($note->save())
        {
            $insert = DB::table($this->table.'_notes')->insert([
                $this->model.'_id' => $this->id,
                'note_id' => $note->id,
            ]);
    
            if ($insert){
                return true;
            }
        }

        return false;
    }



}