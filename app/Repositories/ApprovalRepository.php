<?php

namespace App\Repositories;

use AppApproval\Models\Approval;

class ApprovalRepository extends  Repository
{

    public function model(): string
    {
        return Approval::class;
    }
}
