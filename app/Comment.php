<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'body', 'user_id', 'commentable_type', 'commentable_id'
	];

    public function commentable()
    {
    	return $this->morphTo();
    }

    public function author(	)
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
