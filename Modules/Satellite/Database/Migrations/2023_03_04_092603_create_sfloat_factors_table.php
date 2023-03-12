<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSfloatFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sfloat_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('sfloat_id');
            $table->foreign('sfloat_id')->references('id')->on('sfloats');
            $table->string('number')->nullable()->comment('شماره صورت حساب');
            $table->timestamp('date')->nullable()->comment('تاریخ صورتحساب');
            $table->string('unit_price')->nullable()->comment('مبلغ واحد');
            $table->string('all_price')->nullable()->comment('مبلغ کل');
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
        Schema::dropIfExists('sfloat_factors');
    }
}
