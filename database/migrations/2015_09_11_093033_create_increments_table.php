<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('increments', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('teammate_id')->unsigned();

            $table->date('increment_date');

            $table->decimal('amount',11,2);

            $table->integer('approved')->default(0);

            $table->timestamps();

            $table->foreign('teammate_id')->references('id')->on('teammates');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('increments');
    }
}
