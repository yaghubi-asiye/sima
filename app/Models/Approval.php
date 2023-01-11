<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Approval extends Model
{
    protected $guarded = [];
    public static function schema()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('درج کننده');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('date')->nullable();
            $table->string('number')->nullable();
            $table->string('MeetingType')->nullable();
            $table->string('title')->nullable();
            $table->text('hazerin')->nullable();
            $table->string('fileSooratJalase')->nullable();
            $table->timestamps();
        });
    }

    public function approvalDetails()
    {
        return $this->hasMany(ApprovalDetail::class);
    }

}
