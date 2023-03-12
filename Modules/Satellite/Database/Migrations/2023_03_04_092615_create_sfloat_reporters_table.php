<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSfloatReportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfloat_reporters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('sfloat_id');
            $table->foreign('sfloat_id')->references('id')->on('sfloats');
            $table->string('date')->nullable()->comment('تاریخ');
            $table->string('hour')->nullable()->comment('ساعت');
            $table->string('description')->nullable()->comment('توضیحات');
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
        Schema::dropIfExists('sfloat_reporters');
    }
}
