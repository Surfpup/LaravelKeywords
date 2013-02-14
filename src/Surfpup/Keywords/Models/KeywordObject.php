<?php

use Illuminate\Database\Eloquent\Model;

//Inherit from this model class in order to assign keywords
class KeywordObject extends Model {
	
	public $timestamps = false;
	
	/**
	 * Relation to KeywordMap
	 * 
	 * @return array of keywords
	 */
	public function keywords()
	{
		return $this->morphMany('KeywordMap', 'mappable');
	}
	
	/**
	 * Assigns a keyword to this object
	 * 
	 * @param string $word
	 * 
	 * @return KeywordMap object
	 */
	public function addKeyword($word)
	{
		//See if the keyword already exists
		if(!$keyword = Keyword::where('name', $word)->first()) {
			$keyword = new Keyword(array('name'=>$word));
			$keyword->save();
		} elseif ($keywordMap = KeywordMap::where('keyword_id', $keyword->id)->first())
			return $keywordMap; //The mapping already exists, we don't want duplicates
		
		//Assign the keyword to this object
		//Not sure why it doesn't set mappable_type automatically..
		$keywordMap = new KeywordMap(array('keyword_id'=>$keyword->id, 'mappable_type'=>get_called_class()));
		
		$this->keywords()->save($keywordMap);
		
		return $keywordMap;
	}
	
	/**
	 * Add multiple keywords
	 * 
	 * @param array or string $words
	 * 
	 * @return KeywordMap array
	 */
	public function addKeywords($words)
	{
		if(is_string($words)) //It could be a comma-separated string
			$words = explode(',',$words);
		
		$mappings = array();
		foreach($words as $word)
		{
			$mappings[] = $this->addKeyword(trim($word));
		}
		
		return $mappings;
	}
}
