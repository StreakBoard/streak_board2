<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->index();
            $table->string('provider', 100);
            $table->string('provider_id')->unique();
            $table->dateTime('last_login_at')->nullable();
            $table->string('access_token', 2000)->nullable();
            $table->dateTime('access_token_expired_at')->nullable();
            $table->string('refresh_token', 2000)->nullable();
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('u_auth_providers');
    }
}
