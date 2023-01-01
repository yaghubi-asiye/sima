<?php
namespace App\Repositories;

use App\Models\Newtdl;

class NewtdlRepository extends Repository
{
    public function model(): string
    {
        return Newtdl::class;
    }

}
