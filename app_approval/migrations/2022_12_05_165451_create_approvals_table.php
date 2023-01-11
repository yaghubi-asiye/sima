<?php

use App\Models\Approval;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
