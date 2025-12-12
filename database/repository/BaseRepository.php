<?php

namespace App\database\repository;

use Illuminate\Contracts\Database\ModelIdentifier;
use Illuminate\Database\Eloquent\Model;
use App\contracts\BaseRepositoryInterface;
use \Illuminate\Database\Eloquent\Collection;


abstract class BaseRepository implements BaseRepositoryInterface
{

    public function __construct(
        protected Model $model 
    )
    {}

    

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id): int
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function find(int $id): ?model
    {
        return $this->model->find($id);
    }
}