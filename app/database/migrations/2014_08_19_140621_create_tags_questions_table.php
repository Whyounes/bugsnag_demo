<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags_questions', function(Blueprint $table)
		{
			$table->integer('tag_id')->foreign('tag_id')->references('id')->on('tags');
			$table->integer('question_id')->foreign('question_id')->references('id')->on('questions');

			$table->primary( ['tag_id', 'question_id'] );

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
		Schema::drop('tags_questions');
	}
	
}
