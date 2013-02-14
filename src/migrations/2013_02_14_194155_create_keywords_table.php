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
			$table->unique('name');
		});
		
		//Mapping the words with the table entries
		Schema::create('keywords_map', function($table)
		{
			$table->increments('id');
			$table->integer('keyword_id');
			$table->integer('mappable_id');
			$table->string('mappable_type');
			$table->unique(array('keyword_id', 'mappable_id', 'mappable_type'));
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
	}

}