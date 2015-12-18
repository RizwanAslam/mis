<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldActiveToTeammates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teammates', function (Blueprint $table) {
            $table->integer('status')->after('elance_user_id')->nullable();
            $table->boolean('active')->after('elance_user_id')->default(1);
        });
    }


}
