<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articleitem extends Model
{
	protected $guarded = [];

    public function articleitemable()
    {
    	return $this->morphTo();
    }
}
