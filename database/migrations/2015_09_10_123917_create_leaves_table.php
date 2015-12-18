<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('teammate_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('leave_hours');

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
        Schema::drop('leaves');
    }
}
