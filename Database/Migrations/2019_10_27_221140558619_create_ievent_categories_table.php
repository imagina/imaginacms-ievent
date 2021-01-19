<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ievent__categories', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');

      $table->integer('parent_id');
      $table->integer('place_category_id')->nullable();
      $table->boolean('status');
      $table->text('options')->nullable();

      $table->integer('lft')->unsigned()->nullable();
      $table->integer('rgt')->unsigned()->nullable();
      $table->integer('depth')->unsigned()->nullable();
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
    Schema::dropIfExists('ievent__categories');
  }
}