<?php

namespace App\contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


interface BaseRepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): ?Model;

    public function update(array $data, int $id): int;

    public function delete(int $id): bool;

    public function find(int $id): ?Model;
}