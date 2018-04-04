<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
	protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function permission()
    {
    	return $this->belongsTo(Permission::class);
    }
}
