<?php

class KeywordTest extends TestCase {

    public function testRelations()
    {
    	//We add a new keyword...
		$keyword = new Keyword(array('name'=>'TestWord'));
		$keyword->save();
		
		//Add a new object...
    	$testObj = new KeywordExample;
		$testObj->name = 'TestObj';
		$testObj->save();
		
		//Assign the keyword to this object
		//Not sure why it doesn't set mappable_type automatically..
		$testObj->keywords()->save(new KeyWordMap(array('keyword_id'=>$keyword->id, 'mappable_type'=>'KeywordExample')));
		
		$id = $testObj->id;
		
		//Test retrieval;
		
		$obj = KeywordExample::find($id);
		$this->assertTrue($obj->keywords()->first()->keyword->name == "TestWord");
		
		$secObj = new MoreKeywordExample;
		$secObj->name = 'SecondTestObj';
		$secObj->num = 24;
		$secObj->save();
		
		$secObj->keywords()->save(new KeyWordMap(array('keyword_id'=>$keyword->id, 'mappable_type'=>'MoreKeywordExample')));
		
		$this->assertTrue($secObj->keywords()->first()->keyword->name == "TestWord");
		
		//$keywordMaps->mappable = $testObj;
		//$testObj->keywords()->save($keywordMaps);
		//$keyword->entries(); //->save($keywordMaps);

       /* $this->assertTrue($testObj->keywords()->first()->keyword->name == "TestWord");
		$testObj->delete();
		$keywordMaps->delete();*/
		
		//$keyword->delete();
		//$testObj->delete();
		//$keywordMaps->delete();
    }

}