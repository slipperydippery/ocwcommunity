<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];

    public function contributors()
    {
        return $this->hasMany(Contributor::class);
    }

    public function tags()
    {
    	return $this->morphToMany(Tag::class, 'taggable');
    }

    public function articleitems()
    {
    	return $this->hasMany(Articleitem::class);
    }
}
