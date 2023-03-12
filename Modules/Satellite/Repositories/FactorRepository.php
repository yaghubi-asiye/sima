<?php

namespace Modules\Satellite\Repositories;

use App\Repositories\Repository;
use Modules\Satellite\Entities\SfloatFactor;
class FactorRepository extends Repository
{
    public function model(): string
    {
        return SfloatFactor::class;
    }

}

