<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];

	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
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
