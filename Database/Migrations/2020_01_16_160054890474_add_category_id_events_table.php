<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('ievent__events', function (Blueprint $table) {

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('ievent__categories')->onDelete('restrict');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ievent__events', function (Blueprint $table) {

            $table->dropForeign('ievent__events_category_id_foreign');
            $table->dropColumn('category_id');

        });
    }
}
