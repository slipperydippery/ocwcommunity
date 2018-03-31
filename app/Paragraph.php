<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
	protected $guarded = [];
	
	    public function articleitem()
    {
    	return $this->morphOne(Articleitem::class);
    }
}
