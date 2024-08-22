<?php

namespace App\Repositories;

use Dotenv\Repository\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Repository
{

    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id, $findOrFail = false)
    {
        return $findOrFail ? $this->model->findOrFail($id) : $this->model->find($id);
    }

    public function create(array $attributes)
    {
        return $this->model::create($attributes);
    }

    public function update($id, array $attributes)
    {
        $record = $this->find($id);
        $record->update($attributes);
        return $record;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

}
