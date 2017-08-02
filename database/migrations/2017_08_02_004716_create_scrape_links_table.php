<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScrapeLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scrape_links', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('status', array('queue','processing','finished'))->default('queue');
			$table->enum('type', array('track','album','mixtape','video','spanish'));
			$table->string('href', 191)->unique('href');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scrape_links');
	}

}
