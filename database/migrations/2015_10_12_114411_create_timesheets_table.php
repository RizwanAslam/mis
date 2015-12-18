<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('timesheets', function (Blueprint $table) {
            $table->increments('id');

            $table->date('weekending_date');
            $table->date('working_day');
            $table->decimal('working_hours',11, 2);
            
            $table->decimal('rate_per_hour',11, 2);

            $table->integer('teammate_id')->unsigned();
            $table->foreign('teammate_id')->references('id')->on('teammates');

            $table->integer('jobId')->unsigned();
            $table->foreign('jobId')->references('jobId')->on('projects');

            $table->integer('task_id')->unsigned()->nullable();

            $table->string('remarks');

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
        //
    }
}
