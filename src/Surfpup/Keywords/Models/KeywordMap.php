<?php namespace Surfpup\Keywords\Models;

use Illuminate\Database\Eloquent\Model;

class KeywordMap extends Model {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'keywords_map';
	public $timestamps = false;

	/**
	 * Association with keyword
	 * 
	 * @return object
	 */
	public function keyword()
	{
		return $this->belongsTo('Keyword', 'keyword_id');
	}
	
	/**
	 * Association with other object
	 * 
	 * @return object
	 */
	
	public function mappable()
	{
		return $this->morphTo();
	}
	
}