<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tasks_id');
            $table->string('user_id',200);
            $table->string('email_id',200);
            $table->string('display_name',200);
            $table->string('user_photo',200);
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
        Schema::dropIfExists('task_achievements');
    }
}
