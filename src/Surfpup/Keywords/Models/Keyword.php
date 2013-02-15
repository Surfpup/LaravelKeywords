<?php namespace Surfpup\Keywords\Models;

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
	
	public static function add($word)
	{
		if(!$keyword = static::where('name', $word)->first()) {
			$keyword = new Keyword(array('name'=>$word));
			$keyword->save();
		}
		return $keyword;
	}
}