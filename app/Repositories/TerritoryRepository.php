<?php

namespace App\Repositories;


use App\Models\Territory;

class TerritoryRepository
{
    /**
     * @var Territory
     */
    private $model;

    /**
     * TerritoryRepository constructor.
     * @param Territory $model
     */
    public function __construct(Territory $model)
    {
        $this->model = $model;
    }

    public function getRegionsList()
    {
        return $this->model->region()->get()->pluck('ter_name', 'ter_id');
    }

    public function getNested($ter_id)
    {
        return $this->model->find($ter_id)->nested()->get()->pluck('ter_name', 'ter_id');
    }
}
