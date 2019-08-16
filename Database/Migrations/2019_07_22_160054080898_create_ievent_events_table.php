<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ievent__events', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->timestamp('start_date');
      $table->timestamp('end_date');
      $table->boolean('repeat');
      $table->boolean('all_day');
      $table->text('address');
      $table->text('lgt');
      $table->text('lat');
      $table->double('price', 8, 2);
      $table->integer('organizer_id')->unsigned()->nullable();
      $table->foreign('organizer_id')->references('id')->on('ievent__organizers')->onDelete('restrict');
      $table->integer('status')->default(0)->unsigned();
      $table->text('options');
      $table->integer('user_id')->unsigned()->nullable();
      $table->foreign('user_id')->references('id')->on(config('auth.table', 'users'))->onDelete('restrict');
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
      Schema::dropIfExists('ievent__events');
  }
}
