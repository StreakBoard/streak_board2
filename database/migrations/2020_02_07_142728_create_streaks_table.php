<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streaks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('streaks_status');
            $table->integer('streaks_no');
            $table->integer('user_id');
            $table->integer('team_id');
            $table->string('status');
            $table->integer('task_id');
            $table->string('curr_date');
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
        Schema::dropIfExists('streaks');
    }
}
