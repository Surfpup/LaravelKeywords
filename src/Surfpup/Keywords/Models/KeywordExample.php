<?php

use Illuminate\Database\Eloquent\Model;

//Example of how to create a model to map to keywords
class KeywordExample extends Model {
	
	public $timestamps = false;
	
	public function keywords()
	{
		return $this->morphMany('KeywordMap', 'mappable');
	}
}
