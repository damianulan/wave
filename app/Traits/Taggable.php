<?php

namespace App\Traits;

use App\Models\Tag;

trait Taggable
{
    /**
     * @return mixed
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, $this->table . '_tags');
    }

    /**
    * @param mixed ...$tags
    * @return bool
    */
    public function hasTag(... $tags ) {
        foreach ($tags as $tag) {
            if ($this->tags->contains('slug', $tag)) {
                return true;
            }
        }
        return false;
    }

    public function hasAnyTag(): bool {
        if (count($this->tags)){
            return true;
        }
        return false;
    }

    public function addTag($tag) {
        return $this->tags()->attach($tag);
    }

    public function refreshTags(... $tags){
        $this->tags()->detach();
        return $this->tags()->attach($tags);
    }

}