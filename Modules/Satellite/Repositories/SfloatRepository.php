<?php

namespace Modules\Satellite\Repositories;

use App\Repositories\Repository;
use Modules\Satellite\Entities\Sfloat;

class SfloatRepository extends Repository
{
    public function model(): string
    {
        return Sfloat::class;
    }

    public function updateStatus($model, $status)
    {
        return $model->update(['status' => $status]);
    }

}

