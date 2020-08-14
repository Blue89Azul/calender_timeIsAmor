<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('planTitle');
            $table->integer('likeCheck')->nullable();
            // 開始時刻
            $table->integer('startY');
            $table->integer('startM');
            $table->integer('startD');
            $table->integer('startH');
            $table->integer('startMinu');
            // 終了時刻
            $table->integer('endY');
            $table->integer('endM');
            $table->integer('endD');
            $table->integer('endH');
            $table->integer('endMinu');
            $table->timestamps();
            // いいね機能（レビュー）
            $table->integer('likeA')->nullable();
            $table->integer('likeB')->nullable();
            $table->integer('likeC')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('input_plans');
    }
}
