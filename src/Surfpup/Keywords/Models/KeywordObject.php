<?php

use Illuminate\Database\Eloquent\Model;

//Inherit from this model class in order to assign keywords
class KeywordObject extends Model {
	
	public $timestamps = false;
	
	public function keywords()
	{
		return $this->morphMany('KeywordMap', 'mappable');
	}
}
