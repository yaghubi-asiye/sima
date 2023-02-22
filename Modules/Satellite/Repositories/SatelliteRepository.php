<?php

namespace Modules\Satellite\Repositories;

use App\Repositories\Repository;
use Modules\Satellite\Entities\Satellite;
class SatelliteRepository extends Repository
{
    public function model(): string
    {
        return Satellite::class;
    }

}

