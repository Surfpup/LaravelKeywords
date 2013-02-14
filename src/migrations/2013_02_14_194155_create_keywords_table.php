<?php

use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Store the words themselves
		Schema::create('keywords', function($table)
		{
		    $table->increments('id');
			$table->string('name', 255);
		});
		
		//Mapping the words with the table entries
		Schema::create('keywords_map', function($table)
		{
			$table->increments('id');
			$table->integer('keyword_id');
			$table->integer('mappable_id');
			$table->string('mappable_type');
		});
		
		Schema::create('keyword_examples', function($table)
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('keywords');
		Schema::drop('keywords_map');
		Schema::drop('keyword_examples');
		Schema::drop('more_keyword_examples');
	}

}