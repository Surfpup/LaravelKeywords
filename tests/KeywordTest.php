<?php

class KeywordTest extends TestCase {

    public function testRelations()
    {
    	//First create tables to test with
    	
    	try { //Just in case something failed previously
    		Schema::drop('keyword_objects');
			Schema::drop('more_keyword_examples');
    	} catch(Exception $e) {
			
		}
		
    	Schema::create('keyword_objects', function($table)
		{
			$table->increments('id');
			$table->string('name', 255);
		});
		
		Schema::create('more_keyword_examples', function($table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->integer('num');
		});
		
    	//We add a new keyword...
		$keyword = Keyword::add('TestWord');
		
		//Add a new object...
    	$testObj = new KeywordObject;
		$testObj->name = 'TestObj';
		$testObj->save();
		
		$keywordMap = $testObj->addKeyword('TestWord');
		
		$id = $testObj->id;
		
		//Test retrieval
		
		$obj = KeywordObject::find($id);
		$this->assertTrue($obj->keywords()->first()->keyword->name == "TestWord");
		
		//Test that this works with another table...
		
		$secObj = new MoreKeywordExample;
		$secObj->name = 'SecondTestObj';
		$secObj->num = 24;
		$secObj->save();
		
		$keywordMap2 = $secObj->addKeyword('TestWord2');
		
		$this->assertTrue($secObj->keywords()->first()->keyword->name == "TestWord2");
		
		//Delete keywords and mappings
		$keyword->delete();
		$keywordMap->delete();
		$keywordMap2->keyword->delete();
		$keywordMap2->delete();
		
		/*
		$third = new KeywordObject(array('name'=>'MoreTest'));
		$third->save();
		$third->addKeywords(array('Test', 'Testing', 'Testify'));
		$third->addKeywords('More Test, Super Test, Woot!');
		*/
		
		
		//Drop test tables
		Schema::drop('keyword_objects');
		Schema::drop('more_keyword_examples');
    }

}