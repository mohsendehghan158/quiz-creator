<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_statistics', function (Blueprint $table) {
            $table->increments('quiz_statistic_id');
            $table->integer('quiz_statistic_user_id');
            $table->integer('quiz_statistic_quiz_id');
            $table->integer('quiz_statistic_true_answers');
            $table->integer('quiz_statistic_false_answers');
            $table->float('quiz_statistic_percent');
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
        Schema::dropIfExists('quiz_statistics');
    }
}
