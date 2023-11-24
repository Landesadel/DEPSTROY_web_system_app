<?php

namespace App\QueryBuilders;

use App\Models\Camera;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CameraQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Camera::query();
    }

    /**
     * @return Collection
     */
    function getCollection(): Collection
    {
        return $this->model->get();
    }

    /**
     * @return Camera|null
     */
    function getStatus(): Camera|null
    {
        return $this->model->first();
    }
}
