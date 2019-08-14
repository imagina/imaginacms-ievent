<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIeventTicketTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ievent__ticket_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('ticket_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['ticket_id', 'locale']);
            $table->foreign('ticket_id')->references('id')->on('ievent__tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ievent__ticket_translations', function (Blueprint $table) {
            $table->dropForeign(['ticket_id']);
        });
        Schema::dropIfExists('ievent__ticket_translations');
    }
}
