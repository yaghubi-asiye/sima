<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheet_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
//            $table->unsignedInteger('project_id');
//            $table->foreign('project_id')->references('id')->on('projects');
            $table->bigInteger('parent_id')->default(0);
            $table->string('day', 50)->nullable();
            $table->string('month', 50)->nullable();
            $table->timestamp('date')->nullable();
            $table->string('subject', 250)->nullable();
            $table->text('description')->nullable();
            $table->text('result')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
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
        Schema::dropIfExists('sheet_projects');
    }
}
