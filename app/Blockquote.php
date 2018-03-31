<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockquote extends Model
{
	protected $guarded = [];
	
	public function articleitem()
    {
    	return $this->morphOne(Articleitem::class);
    }
}
