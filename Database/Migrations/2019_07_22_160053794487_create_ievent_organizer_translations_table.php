<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventOrganizerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ievent__organizer_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('organizer_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['organizer_id', 'locale']);
            $table->foreign('organizer_id')->references('id')->on('ievent__organizers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ievent__organizer_translations', function (Blueprint $table) {
            $table->dropForeign(['organizer_id']);
        });
        Schema::dropIfExists('ievent__organizer_translations');
    }
}
