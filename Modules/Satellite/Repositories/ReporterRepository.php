<?php

namespace Modules\Satellite\Repositories;

use App\Repositories\Repository;
use Modules\Satellite\Entities\SfloatReporter;
class ReporterRepository extends Repository
{
    public function model(): string
    {
        return SfloatReporter::class;
    }

}

