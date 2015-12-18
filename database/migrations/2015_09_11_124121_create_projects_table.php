<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {


            $table->integer('jobId')->unsigned();
            $table->primary('jobId');
            $table->integer('bidId');
            $table->string('name');
            $table->text('description');
            $table->date('startDate');
            $table->date('endDate');
            $table->string('clientUserId');
            $table->string('clientName');
            $table->string('clientCountry');
            $table->string('clientCountryCode');
            $table->boolean('isHourly');
            $table->boolean('isEscrow');
            $table->string('category');
            $table->string('subcategory');
            $table->string('phase');
            $table->string('status');
            $table->string('jobURL');

            $table->boolean('sync')->default(1);

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
