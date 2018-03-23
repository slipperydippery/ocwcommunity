<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'id', 'user_id', 'title', 'body',
	];

	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
    	return $this->morphToMany(Tag::class, 'taggable');
    }
}
