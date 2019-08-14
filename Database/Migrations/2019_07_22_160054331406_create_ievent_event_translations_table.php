<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventEventTranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ievent__event_translations', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->text('summary');
      $table->text('title');
      $table->text('description')->nullable();
      $table->text('slug');
      $table->text('meta_title')->nullable();
      $table->text('meta_description')->nullable();
      $table->text('meta_keywords')->nullable();
      $table->string('locale')->index();
      $table->integer('event_id')->unsigned();
      $table->unique(['event_id', 'locale']);
      $table->foreign('event_id')->references('id')->on('ievent__events')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('ievent__event_translations', function (Blueprint $table) {
        $table->dropForeign(['event_id']);
    });
    Schema::dropIfExists('ievent__event_translations');
  }
}
