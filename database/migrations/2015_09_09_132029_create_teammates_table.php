<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeammatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teammates', function (Blueprint $table) {
            $table->increments('id');

            $table->string('full_name');
            $table->string('father_name');
            $table->date('date_of_birth');

            $table->date('date_of_joining');
            $table->string('designation');

            $table->integer('months_of_confirmation');
            $table->integer('months_of_increment');

            $table->decimal('basic_pay',11, 2);

            $table->string('email')->unique();
            $table->string('phone_mobile')->unique();
            $table->string('phone_home');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');

            $table->integer('elance_user_id')->nullable();

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
        Schema::drop('teammates');
    }
}
