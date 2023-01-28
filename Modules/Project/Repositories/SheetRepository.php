<?php

namespace Modules\Project\Repositories;

use App\Repositories\Repository;
use Modules\Project\Entities\SheetProject;

class SheetRepository extends Repository
{
    public function model(): string
    {
        return SheetProject::class;
    }

}

