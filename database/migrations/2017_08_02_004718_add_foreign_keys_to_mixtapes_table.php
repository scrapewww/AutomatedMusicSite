<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMixtapesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mixtapes', function(Blueprint $table)
		{
			$table->foreign('genre_id')->references('id')->on('genres')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mixtapes', function(Blueprint $table)
		{
			$table->dropForeign('mixtapes_genre_id_foreign');
		});
	}

}
