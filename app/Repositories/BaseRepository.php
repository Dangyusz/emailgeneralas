<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model
    ) {}

    public function find(int $id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, int $id): int
    {
        $model = $this->model->findOrFail($id);
        return $model->update($data);    
    }

    public function delete(int $id): bool
    {
        $model = $this->model->findOrFail($id);
        return $model->deleteOrFail(); 
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}