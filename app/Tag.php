<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tagcategory()
    {
    	return $this->belongsTo(Tagcategory::class);
    }

    public function posts()
    {
    	return $this->morphedByMany(Post::class, 'taggable');
    }

    public function articles()
    {
    	return $this->morphedByMany(Article::class, 'taggable');
    }
}
