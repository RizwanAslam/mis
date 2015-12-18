<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrations', function (Blueprint $table) {

            $table->increments('id');
            $table->string('server');
            $table->string('server_url');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('access_code');
            $table->string('access_token');
            $table->boolean('active')->default(true);

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
        Schema::drop('integrations');
    }
}
