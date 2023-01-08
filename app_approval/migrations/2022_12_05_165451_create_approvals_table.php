<?php

use AppApproval\Models\Approval;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{

    public function up()
    {
        Approval::schema();
    }


    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
