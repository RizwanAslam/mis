<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('teammate_id')->unsigned();

            $table->date('issued_date');

            $table->float('basic_pay');

            $table->float('increment_amount')->nullable();

            $table->float('hourly_rate')->nullable();

            $table->float('hourly_amount')->nullable();

            $table->float('bonus_amount')->nullable();

            $table->boolean('issued')->default(0);

            $table->foreign('teammate_id')->references('id')->on('teammates');

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
        Schema::drop('salaries');
    }
}
