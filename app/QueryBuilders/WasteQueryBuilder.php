<?php

namespace App\QueryBuilders;

use App\Models\Waste;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class WasteQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Waste::query();
    }

    /**
     * @return Collection
     */
    function getCollection(): Collection
    {
        return $this->model->get();
    }
}
