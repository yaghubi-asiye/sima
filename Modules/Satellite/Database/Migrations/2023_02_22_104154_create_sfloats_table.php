<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSfloatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfloats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('satellite_id');
            $table->foreign('satellite_id')->references('id')->on('satellites');
            $table->bigInteger('parent_id')->default(0);
            $table->string('name')->nullable();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->string('hole_band')->nullable();
            $table->string('upload')->nullable();
            $table->string('download')->nullable();
            $table->string('name_service')->nullable();
            $table->enum('status', ['فنی', 'شناور', 'مالی'])->nullable();
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
        Schema::dropIfExists('sfloats');
    }
}
