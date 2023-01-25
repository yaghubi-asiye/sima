<?php

namespace Modules\Archive\Repositories;

use App\Repositories\Repository;
use Modules\Archive\Entities\Archive;

class ArchiveRepository extends Repository
{
    public function model(): string
    {
        return Archive::class;
    }

}

