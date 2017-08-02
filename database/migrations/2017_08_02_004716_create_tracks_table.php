<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTracksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('status', array('enabled','disabled'));
			$table->integer('genre_id')->unsigned()->index('tracks_genre_id_foreign');
			$table->string('slug', 191);
			$table->string('artist', 191);
			$table->string('name', 191);
			$table->string('image', 191);
			$table->text('download', 65535);
			$table->text('preview', 65535);
			$table->text('additional', 65535)->nullable();
			$table->text('keywords', 65535)->nullable();
			$table->text('og_twitter_image_alt', 65535)->nullable();
			$table->integer('origin')->unsigned()->nullable();
			$table->timestamps();
			$table->boolean('processed')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tracks');
	}

}
