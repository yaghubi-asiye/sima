<?php

namespace App\Repositories;

use App\Models\Approval;

class ApprovalRepository extends  Repository
{

    public function model(): string
    {
        return Approval::class;
    }
}
