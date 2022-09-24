<?php

namespace App\Traits;

use App\Models\Tag;

trait Taggable
{
    /**
     * @return mixed
     */
    public function tags($table)
    {
        return $this->belongsToMany(Tag::class, $table . '_tags');
    }

    /**
    * @param mixed ...$tags
    * @return bool
    */
    public function hasRole(... $tags ) {
        foreach ($tags as $tag) {
            if ($this->tags->contains('slug', $tag)) {
                return true;
            }
        }
        return false;
    }

}