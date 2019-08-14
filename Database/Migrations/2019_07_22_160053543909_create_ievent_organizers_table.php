<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventOrganizersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ievent__organizers', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->text('contact');
      $table->text('address');
      $table->text('options');
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
    Schema::dropIfExists('ievent__organizers');
  }
}
