<?php

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'keywords';
	public $timestamps = false;

	public function entries()
	{
		return $this->hasMany('keywords_map');
	}
}