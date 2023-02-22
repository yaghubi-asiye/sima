<?php

namespace Modules\Project\Repositories;

use App\Repositories\Repository;
use Modules\Project\Entities\DocsProject;

class DocRepository extends Repository
{
    public function model(): string
    {
        return DocsProject::class;
    }

}

